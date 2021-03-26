<?php
namespace App\Service\ProviderTasks\DataModel;

class ProviderDataModel extends ProviderDataAbstract
{

    public function __construct()
    {

    }

    public function setObj(){
        $newArr = new \stdClass();
        $newArr->level = $this->getLevel();
        $newArr->duration = $this->getDuration();
        $newArr->id = $this->getID();
        $newArr->provider = $this->getProviderType();
        $newArr->time = new \DateTime("now");
        return (array) $newArr;
    }
}