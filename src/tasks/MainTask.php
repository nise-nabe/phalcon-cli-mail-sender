<?php

class MainTask extends \Phalcon\CLI\Task
{
    public function mainAction() {
        $users = \User::find();
        foreach ($users as $user) {
            $message = Swift_Message::newInstance('From Phalcon CLI')
                ->setFrom(array('hoge@example.com' => 'Hoge Hoge'))
                ->setTo(array($user->email, $user->email => $user->name))
                ->setBody('Hey '.$user->name.'!')
                ;
            $this->mailer->send($message);
        }
    }
}
