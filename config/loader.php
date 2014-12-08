<?php

$composerDir = APPLICATION_PATH.'/vendor/composer/';

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

// composer
$loader->registerClasses(
    require($composerDir.'autoload_classmap.php')
);

// tasks
$loader->registerDirs([
    APPLICATION_PATH.'/tasks'
]);

$loader->register();
