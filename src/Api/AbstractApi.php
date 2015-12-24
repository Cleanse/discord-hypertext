<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\Api;

use Discord\Discord;
use Discord\HttpClient\Message\ResponseMediator;

abstract class AbstractApi implements ApiInterface
{
    protected $client;
    protected $token;
    protected $perPage;

    public function __construct(Discord $client)
    {
        $this->client = $client;
        $this->token = $client->token();
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function setPerPage($perPage)
    {
        $this->perPage = (null === $perPage ? $perPage : (int) $perPage);
        return $this;
    }

    protected function request($type, $path, array $parameters = [])
    {
        if (null !== $this->perPage && !isset($parameters['per_page'])) {
            $parameters['per_page'] = $this->perPage;
        }
        if (array_key_exists('ref', $parameters) && is_null($parameters['ref'])) {
            unset($parameters['ref']);
        }
        $response = $this->client->getHttpClient()->request($type, $path, $parameters);
        return ResponseMediator::getContent($response);
    }

    protected function createJsonBody($parameters = [])
    {
        return (count($parameters) === 0) ? null : json_encode($parameters, empty($parameters) ? JSON_FORCE_OBJECT : 0);
    }
}