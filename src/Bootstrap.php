<?php

use Phalcon\CLI\Console as ConsoleApp;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

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
    }
}
