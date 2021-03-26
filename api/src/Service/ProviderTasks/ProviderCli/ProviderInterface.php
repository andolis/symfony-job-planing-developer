<?php
namespace App\Service\ProviderTasks\ProviderCli;

Interface ProviderInterface
{
    /**
     *
     * @return mixed
     */
    public function getProviderTaskCurl();

    /**
     * @return mixed
     */
    public function setProviderTaskModel();

    /**
     * @param $arr1
     * @return mixed
     */
    public function setProviderTaskMerge(array $arr1);
}