<?php

namespace App\Http\Repositories\RTC;

use App\Interfaces\CentrifugoInterface;
use App\Helpers\Constants;
use Illuminate\Support\Facades\Http;

class Centrifugo implements CentrifugoInterface
{

    protected $url = "http://selbolt.com:8000/api";

    public function publish($channel, $data)
    {
        $response = Http::withHeaders([

            'Content-type' => 'application/json',
            'Authorization' => 'apikey 93b88395-6e73-40af-bfd0-39ec637d9e87' //58c2400b-831d-411d-8fe8-31b6e337738b'

        ])->post($this->url, [
            'method' => 'publish',
            'params' => [
                "channel" => $channel,
                "data" => [
                    "messages" => "hello"
                ],

            ]
        ]);

        return $response->json();
    }


    public function unSubscribe($channel, $id)
    {
        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => 'apikey aec93168-52fe-4da9-8568-23f22b7e08cc'
        ])->get($this->url, [
            "method" => "unsubscribe",
            "params" => [
                "channel" => $channel,
                "user" => $id
            ]
        ]);

        return response()->json([
            "data" => $response->json()
        ], 200);
    }

    public function broadcast(array $channel, array $data)
    {
        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => 'apikey aec93168-52fe-4da9-8568-23f22b7e08cc'
        ])->post($this->url, [
            'method' => 'broadcast',
            'params' => [
                'channels' => $channel,
                'data' => $data
            ]
        ]);

        return response()->json([
            "data" => $response->json()
        ], 200);
    }
}
