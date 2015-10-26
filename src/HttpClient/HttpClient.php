<?php
namespace Discord\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient
{
    protected $options = [
        'base_uri' => 'https://discordapp.com/api/',
        'user_agent' => 'discord-php (https://github.com/Cleanse/discord-php)'
    ];

    public $token;

    public function __construct($options = [], Client $client = null)
    {
        $this->options = array_merge($this->options, $options);
        $client = $client ?: new Client();
        $this->client = $client;
    }

    public function request($httpMethod = 'GET', $path, $options = [], $auth = false)
    {
        if (!$auth) {
            $options['headers'] = [
                'authorization' => $this->token
            ];
        }
        try {
            $response = $this->client->request($httpMethod, $this->options['base_uri'].$path, $options);
        } catch (RequestException $e) {
            throw $e;
        }
        return $response;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}