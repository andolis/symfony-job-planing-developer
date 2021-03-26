<?php
namespace App\Service\DeveloperTasks;

interface DeveloperTasksInterface {

    public function setTasksToLevel();
    public function getTasksToLevel();
    public function sortTasksList();
    public function sortTasksDuration();
}