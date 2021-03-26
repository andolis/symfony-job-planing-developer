<?php
namespace App\Service\RabbitMq;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqService extends RabbitMqAbstract
{
    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('localhost', 5672, 'rabbitmq', 'rabbitmq');
        $this->channel = $this->connection->channel();
    }

    /*
     * @param string $message
     * @param string $queue
     * @return mixed
     */
    public function newQueue($message,$queue){
        $this->channel->queue_declare($queue, false, false, false, false);
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, '', $queue);
    }

    public function closeConnection(){
        $this->channel->close();
        $this->connection->close();
    }

}