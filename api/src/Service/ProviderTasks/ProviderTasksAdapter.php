<?php

namespace App\Service\ProviderTasks;

use App\Entity\Tasks;
use App\Service\ProviderTasks\ProviderTasks;
use Doctrine\ORM\EntityManagerInterface;

class ProviderTasksAdapter
{
    private $provider;
    private $database;

    public function __construct(ProviderTasks $provider, EntityManagerInterface $database) {
        $this->provider = $provider;
        $this->database = $database;
    }

    /**
     * @return array
     */

    public function getAll(): array
    {
        $this->provider->getProviderTaskCurl();
        return $this->provider->setProviderTaskModel();
    }


    /**
     * @param $arr1
     * @return array
     */

    public function setMerge($arr1): array
    {
        $this->provider->getProviderTaskCurl();
        return $this->provider->setProviderTaskMerge($arr1,$this->provider->setProviderTaskModel());
    }

    /**
     * @return mixed
     */
    public function setDbWrite()
    {
        $this->provider->getProviderTaskCurl();
        $dataList = $this->provider->setProviderTaskModel();
        foreach ($dataList as $e) {
            $task = new Tasks();
            $task->setName($e["id"]);
            $task->setLevel($e["level"]);
            $task->setDuration($e["duration"]);
            $task->setProviderType($e["provider"]);
            $task->setTime($e["time"]);

            $this->database->persist($task);
            $this->database->flush();
        }
    }


}