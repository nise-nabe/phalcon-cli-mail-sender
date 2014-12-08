<?php

use Phalcon\DI\FactoryDefault\CLI as CliDI;

define('VERSION', '@package_version@');

$di = new CliDI();

// Define path to application directory
defined('APPLICATION_PATH') || define('APPLICATION_PATH',  __DIR__);

// autoload
include APPLICATION_PATH.'/config/loader.php';

// Load the configuration file (if any)
if(is_readable(APPLICATION_PATH.'/config/config.php')) {
    $config = include APPLICATION_PATH.'/config/config.php';
    $di->set('config', $config);
}

//Create a console application
$console = new Bootstrap($di);

/**
 * Process the console arguments
 */
$arguments = array();
$params = array();

foreach($argv as $k => $arg) {
    if($k == 1) {
        $arguments['task'] = $arg;
    } elseif($k == 2) {
        $arguments['action'] = $arg;
    } elseif($k >= 3) {
        $params[] = $arg;
    }
}
if(count($params) > 0) {
    $arguments['params'] = $params;
}

try {
    // handle incoming arguments
    $console->handle($arguments);
}
catch (\Phalcon\Exception $e) {
    echo $e->getMessage();
    exit(255);
}
