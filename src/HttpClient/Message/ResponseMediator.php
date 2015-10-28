<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\HttpClient\Message;

use GuzzleHttp\Psr7\Response;

class ResponseMediator
{
    public static function getContent(Response $response)
    {
        $body = $response->getBody(true);
        $content = json_decode($body, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            return $body;
        }
        return $content;
    }
}