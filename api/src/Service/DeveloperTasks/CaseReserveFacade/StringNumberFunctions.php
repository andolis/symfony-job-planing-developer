<?php
namespace App\Service\DeveloperTasks\CaseReserveFacade;


class StringNumberFunctions {
    public static function stringToNumber($stringIn) {
        return intval($stringIn);
    }

    public static function arrayToString($arrayIn) {
        $string_out = NULL;
        foreach ($arrayIn as $key => $oneChar) {
            $string_out .= $oneChar->name." - ";
        }
        return $string_out;
    }
}