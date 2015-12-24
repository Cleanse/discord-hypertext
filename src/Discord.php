<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord;

use Discord\Exception\InvalidArgumentException;
use Discord\Exception\BadMethodCallException;
use Discord\HttpClient\HttpClient;

class Discord
{
    private $httpClient;
    private $token;

    public function __construct($email = null, $password = null, $token = null)
    {
        if (is_null($token)) {
            $token = $this->authenticate($email, $password);
        }
        $this->httpClient = new HttpClient();
        $this->token = $token;
        $this->httpClient->setToken($this->token);
    }

    public function api($name)
    {
        switch ($name) {
            case 'authentication':
                $api = new Api\Authentication($this);
                break;
            case 'channel':
            case 'channels':
                $api = new Api\Channel($this);
                break;
            case 'gateway':
                $api = new Api\Gateway($this);
                break;
            case 'guild':
                $api = new Api\Guild($this);
                break;
            case 'invite':
                $api = new Api\Invite($this);
                break;
            case 'regions':
                $api = new Api\Region($this);
                break;
            case 'user':
            case 'users':
                $api = new Api\User($this);
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

    public function gateway()
    {
        try {
            $gateway = $this->api('gateway')->show();
            $parse = parse_url($gateway['url']);
            return $parse['host'];
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', 'Authentication'));
        }
    }

    public function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = new HttpClient();
        }
        return $this->httpClient;
    }

    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }

    public function token()
    {
        return $this->token;
    }
}