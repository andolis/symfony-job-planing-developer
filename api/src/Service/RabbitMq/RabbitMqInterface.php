<?php
namespace App\Service\RabbitMq;

interface RabbitMqInterface {

    public function newQueue($message,$queue);
    public function closeConnection();
}