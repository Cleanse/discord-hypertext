<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\Api\Channel;

use Discord\Api\AbstractApi;

class Invites extends AbstractApi
{
    /**
     * @param $channelId
     * @return array
     */
    public function create($channelId)
    {
        return $this->request('POST', 'channels/' . $channelId . '/invites');
    }
}