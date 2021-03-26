<?php
namespace App\Service\ProviderTasks\Exception;
use Exception;

class ProviderCurlError extends Exception
{
    protected $message = 'PROVIDER_CURL_ERROR';

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->message;
    }
}