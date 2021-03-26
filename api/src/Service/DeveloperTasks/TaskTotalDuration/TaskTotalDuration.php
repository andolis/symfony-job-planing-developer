<?php
namespace App\Service\DeveloperTasks\TaskTotalDuration;

use App\Service\DeveloperTasks\CaseReserveFacade\CaseReverseFacade;

class TaskTotalDuration implements TaskTotalDurationInterface
{
    private static $instance = false;
    private static $countDuration = 0;
    private static $setMaxTimes = 0;
    private static $arrayDuration = [];

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /*
     * @params int $setTimes
     */
    public static function setMaxTimes($setTimes){
        self::$setMaxTimes = $setTimes;
    }

    public static function create($t,$e){

        $totalDuration = self::$countDuration + $e->duration;
        if($totalDuration<=self::$setMaxTimes){
            self::$countDuration += $e->duration;
            self::$arrayDuration[] = $e;
            return NULL;
        }
        elseif ($totalDuration>self::$setMaxTimes){

            $tData = new \stdClass();
            $tData->lists = self::$arrayDuration;
            $tData->lists_text[] = CaseReverseFacade::reverseStringArrayCase(self::$arrayDuration);
            $tData->durations = self::$countDuration;
            $t->tasksList[] = $tData;

            self::$countDuration = 0;
            self::$arrayDuration = [];

        }
    }




}