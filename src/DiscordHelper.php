<?php
namespace Discord;

use GuzzleHttp\Client;

class DiscordHelper
{
    public function request($type, $uri, $params = [])
    {
        $client = new Client();
        $request = $client->request($type, 'https://discordapp.com/api/' . $uri, $params);
        return $request;
    }

    public function toJson($object)
    {
        return json_encode($object);
    }

    public function toArray($object)
    {
        return json_decode(json_encode($object), true);
    }

    public function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $instance = new self;

        return $instance->with($relations);
    }
}