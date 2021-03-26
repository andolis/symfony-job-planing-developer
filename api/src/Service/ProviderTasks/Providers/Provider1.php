<?php
namespace App\Service\ProviderTasks\Providers;

use App\Service\ProviderTasks\DataModel\ProviderDataModel;

class Provider1
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
        foreach ($this->data as $e){
            $newProviderTasks = new ProviderDataModel();
            $newProviderTasks->setProviderType($newProviderTasks::PROVIDER1);
            $newProviderTasks->setLevel($e["zorluk"]);
            $newProviderTasks->setDuration($e["sure"]);
            $newProviderTasks->setID($e["id"]);
            $mainData[] = $newProviderTasks->setObj();
        }
        return $mainData;
    }
}