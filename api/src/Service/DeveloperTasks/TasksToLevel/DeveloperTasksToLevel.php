<?php
namespace App\Service\DeveloperTasks\TasksToLevel;

class DeveloperTasksToLevel implements LevelListInterface
{
    private $levelList = NULL;

    public function __construct()
    {

    }

    /**
     * @param int $level
     * @param array $task
     * @return
     */
    function addTask($level, $task){
        if (NULL == $this->levelList) { $this->makeLevelList(); }
        if (NULL == $this->getLevel($level)) { $this->addLevel($level); }
        return $this->levelList->addTask($level, $task);
    }

    function getTask($level, $task){
        if (NULL == $this->levelList) { $this->makeLevelList(); }
        if (NULL == $this->getLevel($level)) { $this->addLevel($level); }
        return $this->levelList->getTask($level, $task);
    }

    /**
     * @param int $level
     * @return
     */
    function addLevel($level){
        if (NULL == $this->levelList) { $this->makeLevelList(); }
        return $this->levelList->addLevel($level);
    }

    function getLevel($level){
        if (NULL == $this->levelList) { $this->makeLevelList(); }
        return $this->levelList->getLevel($level);
    }

    function makeLevelList() {
        $this->levelList = new LevelList();
    }

    function getLevelList() {
        return $this->levelList->getLevelList();
    }
}