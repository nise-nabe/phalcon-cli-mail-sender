<?php

$composerDir = APPLICATION_PATH.'/vendor/composer/';

$loader = new \Phalcon\Loader();

// composer
$loader->registerClasses(
    require($composerDir.'autoload_classmap.php')
);

// tasks
$loader->registerDirs([
    APPLICATION_PATH.'/tasks'
]);

$loader->register();
