<?php

namespace App\Interfaces;

interface CentrifugoInterface
{
    /**
     * pass data to be send as message
     * @param $data
     * @return
     */

    public function publish(string $channel, array $data);

    public function unSubscribe(string $channel, $id);

    /**
     * send same message to many channels
     * @param $data
     * @return
     */

    public function broadcast(array $channel, array $data);
}
