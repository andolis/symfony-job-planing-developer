<?php
namespace App\Service\DeveloperTasks\TasksToLevel;

use App\Service\DeveloperTasks\CaseReserveFacade\CaseReverseFacade;

class LevelList implements LevelListInterface {

    private $list;

    public function __construct() {
        $this->list = new \stdClass();
    }

    public function getLevelList() {
        return $this->list ? $this->list: NULL;
    }

    /**
     * @param int $level
     * @return
     */
    public function getLevel($level) {
        return isset($this->list->{$level}) ? $this->list->{$level} : NULL;
    }

    public function addLevel($level) {
        $this->list->{$level} = new \stdClass();
        $this->list->{$level}->level = $level;
        $this->list->{$level}->tasks = [];
    }

    /**
     * @param int $level
     * @param mixed $task
     * @return
     */
    public function addTask($level,$task) {
        $that = new \stdClass();
        $that->id = CaseReverseFacade::reverseStringCase($task["id"]);
        $that->level = CaseReverseFacade::reverseStringCase($task["level"]);
        $that->duration = CaseReverseFacade::reverseStringCase($task["duration"]);
        $that->name = isset($task["name"]) ? $task["name"] : $task["id"];
        $this->list->{$level}->tasks[] = $that;
    }

    public function getTask($level,$task) {
        foreach ($this->list->{$level}->tasks as $k => $t){
            if($task["id"]==$t->id) {
                return $t;
            }
        }
        return NULL;
    }

}