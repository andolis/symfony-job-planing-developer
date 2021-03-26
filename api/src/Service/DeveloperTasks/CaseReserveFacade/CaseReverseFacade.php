<?php
namespace App\Service\DeveloperTasks\CaseReserveFacade;

class CaseReverseFacade {
    public static function reverseStringCase($stringIn) {
        return StringNumberFunctions::stringToNumber($stringIn);
    }

    public static function reverseStringArrayCase($arrayIn) {
        return StringNumberFunctions::arrayToString($arrayIn);
    }
}