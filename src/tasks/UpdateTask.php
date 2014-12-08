<?php

use Herrera\Phar\Update\Manager;
use Herrera\Phar\Update\Manifest;

class UpdateTask extends \Phalcon\CLI\Task
{
    const MANIFEST_FILE = '@manifest_url@';

    public function mainAction()
    {
        $manager = new Manager(Manifest::loadFile(self::MANIFEST_FILE));
        $manager->update(VERSION, true);
    }
}
