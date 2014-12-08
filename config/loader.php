<?php

$composerDir = APPLICATION_PATH.'/vendor/composer/';

$loader = new \Phalcon\Loader();

$loader->registerClasses(
    require($composerDir.'autoload_classmap.php')
);

$loader->registerDirs([
    APPLICATION_PATH.'/tasks'
]);

$loader->register();
