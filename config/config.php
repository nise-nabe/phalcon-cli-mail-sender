<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'  => 'Mysql',
        'host'     => '',
        'username' => '',
        'password' => '',
        'dbname'   => '',
        'charset'  => 'utf8mb4',
    ),
    'mail' => array(
        'from' => 'hoge@example.com',
        'fromName' => 'Hoge Fuga',
    ),
));
