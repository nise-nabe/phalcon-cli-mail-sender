<?php

use Phalcon\CLI\Console as ConsoleApp;

class Bootstrap extends ConsoleApp
{
    public function __construct($di)
    {
        parent::__construct($di);
    }
}
