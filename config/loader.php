<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs([
    APPLICATION_PATH.'/tasks'
]);

$loader->register();
