<?php
namespace App\Service\RabbitMq;

abstract class RabbitMqAbstract implements RabbitMqInterface
{

    protected $connection;
    protected $channel;

    public function getConnection()
    {
        return $this->connection;
    }

    public function getChannel()
    {
        return $this->channel;
    }

    abstract public function newQueue($message,$queue);
    abstract public function closeConnection();

}