<?php

use Phalcon\CLI\Console as ConsoleApp;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Events\Manager as EventsManager;

class Bootstrap extends ConsoleApp
{
    public function __construct($di)
    {
        parent::__construct($di);

        $di->set('db', function () use ($di) {
            $config = $di->get('config');
            $db = new DbAdapter(array(
                'host'     => $config->database->host,
                'username' => $config->database->username,
                'password' => $config->database->password,
                'dbname'   => $config->database->dbname
            ));
            return $db;
        });

        $di->set('mailer', function() {
            $transport = Swift_MailTransport::newInstance();
            $mailer = Swift_Mailer::newInstance($transport);

            return $mailer;
        }, true);

        $di->set('logger', function() {
            $logger = new \Phalcon\Logger\Adapter\Stream("php://stdout");
            return $logger;
        }, true);

        $di->set('dispatcher', function() {
                $eventsManager = new EventsManager();
                $eventsManager->attach('dispatch', new \TaskLogListener());

                $dispatcher = new \Phalcon\CLI\Dispatcher();
                $dispatcher->setEventsManager($eventsManager);
                return $dispatcher;
        }, true);
    }
}
