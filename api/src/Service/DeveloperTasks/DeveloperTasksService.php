<?php
namespace App\Service\DeveloperTasks;

use App\Service\DeveloperTasks\TasksToLevel\DeveloperTasksToLevel;
use App\Service\DeveloperTasks\TaskTotalDuration\TaskTotalDuration;

class DeveloperTasksService extends DeveloperTasksAbstract
{
    protected $list;
    protected $maxTimes = 45;

    public function __construct($list)
    {
        $this->list = $list;
    }


    public function setTasksToLevel(){
        $newTasksToLevel = new DeveloperTasksToLevel();
        foreach ($this->list as $l){
            $getLevel = $newTasksToLevel->getLevel($l["level"]);
            $getTask = $newTasksToLevel->getTask($l["level"],$l);
            if(!$getTask){ $newTasksToLevel->addTask($l["level"],$l); }
        }
        $this->list = $newTasksToLevel->getLevelList();
        return $this->list;
    }

    public function getTasksToLevel(){
        return $this->list;
    }

    public function sortTasksList(){
        foreach ($this->list as $k => $t){
            usort($this->list->{$k}->tasks, function($a, $b) {
                return $a->duration > $b->duration ? -1 : 1;
            });
        }
        $this->list = array_values((array) $this->list);
        return $this->list;
    }

    public function sortTasksDuration(){
        foreach ($this->list as $t){
            $newTaskTotalDuration = TaskTotalDuration::getInstance();
            $newTaskTotalDuration::setMaxTimes($this->maxTimes);
            foreach ($t->tasks as $e){
                $newTaskTotalDuration::create($t,$e);
            }
            unset($t->tasks);
        }
        $this->list = array_values((array) $this->list);
        return $this->list;
    }

}