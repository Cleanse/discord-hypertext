<?php
namespace Discord;

use Discord\Api\ApiInterface;
use Discord\Exception\InvalidArgumentException;
use Discord\Exception\BadMethodCallException;
use Discord\HttpClient\HttpClient;
use Discord\HttpClient\HttpClientInterface;

class Discord
{
    private $options = [
        'base_url'    => 'https://discordapp.com/api/',
        'user_agent'  => 'discord-php (https://github.com/Cleanse/discord-php)'
    ];

    private $httpClient;
    public $token;

    public function __construct($email, $password, HttpClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient;
        $this->token = $this->authenticate($email, $password);
    }

    public function api($name)
    {
        switch ($name) {
            case 'authentication':
                $api = new Api\Authentication($this);
                break;
            case 'server':
            case 'servers':
            case 'guild':
            case 'guilds':
                $api = new Api\Guild($this);
                break;
            case 'channel':
            case 'channels':
                $api = new Api\Channel($this);
                break;
            case 'message':
            case 'messages':
                $api = new Api\Message($this);
                break;
            case 'user':
            case 'users':
                $api = new Api\User($this);
                break;
            case 'region':
            case 'regions':
                $api = new Api\Region($this);
                break;
            default:
                throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }
        return $api;
    }

    public function authenticate($email, $password)
    {
        try {
            return $this->api('authentication')->login($email, $password);
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', 'Authentication'));
        }
    }

    public function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = new HttpClient($this->options);
        }
        return $this->httpClient;
    }

    public function setHttpClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getOption($name)
    {
        if (!array_key_exists($name, $this->options)) {
            throw new InvalidArgumentException(sprintf('Undefined option called: "%s"', $name));
        }
        return $this->options[$name];
    }

    public function setOption($name, $value)
    {
        if (!array_key_exists($name, $this->options)) {
            throw new InvalidArgumentException(sprintf('Undefined option called: "%s"', $name));
        }
        $this->options[$name] = $value;
    }

    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }
}