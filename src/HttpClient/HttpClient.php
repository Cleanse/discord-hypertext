<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient
{
    protected $token;

    public function __construct()
    {
        $this->client = new Client([
            'defaults' => [
                'headers' => [
                    'User-Agent' => 'discord-hypertext (https://github.com/Cleanse/discord-hypertext)',
                ],
            ],
        ]);
    }

    public function request($httpMethod = 'GET', $path, $options = [], $auth = false)
    {
        if (!$auth) {
            $options['headers'] = [
                'authorization' => $this->token
            ];
        }
        try {
            $response = $this->client->request($httpMethod, 'https://discordapp.com/api/'.$path, $options);
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