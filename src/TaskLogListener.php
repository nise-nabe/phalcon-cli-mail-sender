<?php

class TaskLogListener
{
    public function beforeDispatch($event, $dispatcher)
    {
        $di = $dispatcher->getDI();
        $task = $dispatcher->getTaskName();
        $action = $dispatcher->getActionName();
        $di['logger']->info($task.'#'.$action.': start');
    }

    public function afterDispatch($event, $dispatcher)
    {
        $di = $dispatcher->getDI();
        $task = $dispatcher->getTaskName();
        $action = $dispatcher->getActionName();
        $di['logger']->info($task.'#'.$action.': finish');
    }

    public function beforeException($event, $dispatcher, $ex)
    {
        $di = $dispatcher->getDI();
        $task = $dispatcher->getTaskName();
        $action = $dispatcher->getActionName();
        $message = sprintf('%s#%s: aborted: "%s"', $task, $action, $ex->getMessage());
        $di['logger']->error($message);
        return false;
    }
}
