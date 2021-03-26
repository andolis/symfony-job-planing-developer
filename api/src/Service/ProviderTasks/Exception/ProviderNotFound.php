<?php
namespace App\Service\ProviderTasks\Exception;
use Exception;

class ProviderNotFound extends Exception
{
    protected $message = 'PROVIDER_NOT_FOUND';

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->message;
    }
}