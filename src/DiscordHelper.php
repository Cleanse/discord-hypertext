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
        return json_decode($object->getBody());
    }

    public function toArray($object)
    {
        return json_decode(json_encode($object), true);
    }
}
