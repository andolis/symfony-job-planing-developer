<?php
namespace App\Service\DeveloperTasks;

abstract class DeveloperTasksAbstract implements DeveloperTasksInterface
{

    abstract public function setTasksToLevel();
    abstract public function getTasksToLevel();
    abstract public function sortTasksList();
    abstract public function sortTasksDuration();

}