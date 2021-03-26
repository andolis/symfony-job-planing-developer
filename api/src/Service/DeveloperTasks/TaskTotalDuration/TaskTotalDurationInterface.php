<?php
namespace App\Service\DeveloperTasks\TaskTotalDuration;


interface TaskTotalDurationInterface
{

    /*
     * @params int $setTimes
     */
    public static function setMaxTimes($setTimes);

    public static function create($t,$e);
}