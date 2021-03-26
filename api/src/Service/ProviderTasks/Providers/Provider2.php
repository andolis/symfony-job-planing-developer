<?php
namespace App\Service\ProviderTasks\Providers;

use App\Service\ProviderTasks\DataModel\ProviderDataModel;

class Provider2
{
    private $data;

    function __construct($data)
    {
        $this->data = $data;
    }

    /*
     * params array $data
     * @return mixed
     */
    public function getTasks(){
        $mainData = [];
        foreach ($this->data as $k){
            $e = current($k);
            $newProviderTasks = new ProviderDataModel();
            $newProviderTasks->setProviderType($newProviderTasks::PROVIDER2);
            $newProviderTasks->setLevel($e["level"]);
            $newProviderTasks->setDuration($e["estimated_duration"]);
            $newProviderTasks->setID(key($k));
            $mainData[] = $newProviderTasks->setObj();
        }
        return $mainData;
    }
}