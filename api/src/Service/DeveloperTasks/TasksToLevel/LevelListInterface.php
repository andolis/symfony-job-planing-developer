<?php
namespace App\Service\DeveloperTasks\TasksToLevel;

interface LevelListInterface {

    public function getLevelList();
    /**
     * @param int $level
     * @return
     */
    public function getLevel($level);
    public function addLevel($level);
    /**
     * @param int $level
     * @param array $task
     * @return
     */
    public function addTask($level,$task);
    public function getTask($level,$task);
}
