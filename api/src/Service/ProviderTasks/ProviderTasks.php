<?php

namespace App\Service\ProviderTasks;

use App\Service\ProviderTasks\ProviderCli\ProviderAbstract;
use App\Service\ProviderTasks\Traits\ProviderTasksTrait;

class ProviderTasks extends ProviderAbstract
{
    use ProviderTasksTrait;

    public function __construct($url, $providerType, $params = [], $method = "POST")
    {
        $this->url = $url;
        $this->providerType = $providerType;
        $this->params = $params;
        $this->method = $method;
    }



}