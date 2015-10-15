<?php
namespace Discord\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Discord\Exception\TwoFactorAuthenticationRequiredException;
use Discord\Exception\ErrorException;
use Discord\Exception\RuntimeException;
use Discord\HttpClient\Listener\AuthListener;
use Discord\HttpClient\Listener\ErrorListener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class HttpClient implements HttpClientInterface
{
    protected $options = [
        'base_uri' => 'https://discordapp.com/api/',
        'user_agent' => 'discord-php (https://github.com/Cleanse/discord-php)'
    ];

    public function __construct(array $options = [], Client $client = null)
    {
        $this->options = array_merge($this->options, $options);
        $client = $client ?: new Client();
        $this->client = $client;
    }

    public function request($httpMethod = 'GET', $path, array $options = [])
    {
        try {
            $response = $this->client->request($httpMethod, $this->options['base_uri'].$path, $options);
        } catch (RequestException $e) {
            throw $e;
        }
        return $response;
    }
}