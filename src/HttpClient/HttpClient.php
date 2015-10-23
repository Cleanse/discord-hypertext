<?php
namespace Discord\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class HttpClient implements HttpClientInterface
{
    protected $options = [
        'base_uri' => 'https://discordapp.com/api/',
        'user_agent' => 'discord-php (https://github.com/Cleanse/discord-php)'
    ];

    public function __construct($options = [], Client $client = null)
    {
        $this->options = array_merge($this->options, $options);
        $client = $client ?: new Client();
        $this->client = $client;
    }

    public function request($httpMethod = 'GET', $path, $options = [])
    {
        try {
            $response = $this->client->request($httpMethod, $this->options['base_uri'].$path, $options);
        } catch (RequestException $e) {
            throw $e;
        }
        return $response;
    }
}