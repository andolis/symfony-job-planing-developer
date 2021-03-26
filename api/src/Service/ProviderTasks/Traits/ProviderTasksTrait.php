<?php

namespace App\Service\ProviderTasks\Traits;

use App\Service\ProviderTasks\Exception\ProviderCurlError;
use App\Service\ProviderTasks\Exception\ProviderNotFound;

trait ProviderTasksTrait {

    /**
     *
     * @return mixed
     */

    public function getProviderTaskCurl()
    {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $this->method,
                CURLOPT_POSTFIELDS => $this->params,
            ));
            $response = curl_exec($curl);
            if (curl_errno($curl)) { throw new ProviderCurlError(); }
            curl_close($curl);
            $this->setTaskList(json_decode($response,true));
    }

    /**
     *
     * @return mixed
     */
    public function setProviderTaskModel() {
        $class = "App\Service\ProviderTasks\Providers\\" . $this->getProviderType();
        if (class_exists($class)) {
            $class = new $class($this->getTaskList());
            return $class->getTasks();
        }
        else {
            throw new ProviderNotFound();
        }
    }

    /**
     * @param $arr1
     * @return mixed
     */
    public function setProviderTaskMerge($arr1 = []) {
        return array_merge($arr1,$this->setProviderTaskModel());
    }

}