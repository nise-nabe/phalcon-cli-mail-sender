<?php

class VersionTask extends \Phalcon\CLI\Task
{
    public function mainAction() 
    {
        $this->logger->info(VERSION);
    }
}
