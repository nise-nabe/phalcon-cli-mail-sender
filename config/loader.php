<?php


require APPLICATION_PATH.'/vendor/autoload.php';

$loader = new \Phalcon\Loader();

// for Phar file
$eventsManager = new \Phalcon\Events\Manager();
$eventsManager->attach('loader', function($event, $loader, $path) {
    if ($event->getType() === 'pathFound') {
        if (Phar::running()) {
            require_once $path;
        }
    }
});
$loader->setEventsManager($eventsManager);

// tasks
$loader->registerDirs([
    APPLICATION_PATH.'/src/',
    APPLICATION_PATH.'/src/models/',
    APPLICATION_PATH.'/src/tasks/',
]);

$loader->register();
