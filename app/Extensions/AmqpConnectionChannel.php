<?php

namespace App\Extensions;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPIOException;

trait AmqpConnectionChannel
{
    public function setup()
    {
        $retries = 0;
        while ($retries < 10) {
            ++$retries;

            try {
                $connection = new AMQPStreamConnection(env('RABBITMQ_HOST'), env('RABBITMQ_PORT'), env('RABBITMQ_USER'), env('RABBITMQ_PASSWORD'), env('RABBITMQ_VHOST'));
                $channel = $connection->channel();
                break;
            } catch (AMQPIOException $exception) {
                sleep(1);
            }
        }

        if (isset($exception) && empty($connection)) {
            throw $exception;
        }

        return [$connection, $channel];
    }
}
