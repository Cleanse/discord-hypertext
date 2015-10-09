<?php
namespace Discord;

use GuzzleHttp\Client;

class DiscordHelper
{
    public function request($type, $uri, $params = [])
    {
        $client = new Client();
        try {
            $request = $client->request($type, 'https://discordapp.com/api/' . $uri, $params);
        } catch (ClientErrorResponseException $e) {
            throw new GuzzleURIException($e->getMessage());
        } catch (ServerException $e) {
            throw new GuzzleServerException($e->getMessage());
        }
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
}