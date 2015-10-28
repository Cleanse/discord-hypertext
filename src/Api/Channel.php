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

use Discord\Api\Channel\Permissions;

class Channel extends AbstractApi
{
    /*
     * {"type":"text","name":"YourChannelName"}
     */
    public function create($guildId, $name, $type = 'text')
    {
        return $this->request('POST', 'guilds/' . $guildId . '/channels', [
            'json' => [
                'type' => $type,
                'name' => $name
            ]
        ]);
    }

    public function delete($channelId)
    {
        return $this->request('DELETE', 'channels/' . $channelId);
    }

    /*
     * {"name":"ChannelName","position":0,"topic":"YourTopicName"}
     */
    public function edit($channelId, $array)
    {
        return $this->request('PATCH', 'channels/' . $channelId, [
            'json' => $array
        ]);
    }

    /*
     * Small wrapper to change topic only.
     */
    public function topic($channelId, $topic)
    {
        return $this->edit($channelId, ['topic' => $topic]);
    }

    public function view($channelId)
    {
        return $this->request('GET', 'channels/' . $channelId);
    }

    public function permissions()
    {
        return new Permissions($this->client);
    }
}