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

use Discord\Api\Channel\Invites;
use Discord\Api\Channel\Messages;
use Discord\Api\Channel\Permissions;

class Channel extends AbstractApi
{
    /**
     * Create a new channel.
     *
     * @param string $guildId
     * @param string $name
     * @param string $type
     * @return array
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

    /**
     * Edit a channel.
     *
     * @param string $channelId Required
     * @param string $name      Required
     * @param int    $position
     * @param string $topic
     * @return array
     */
    public function edit($channelId, $name = null, $position = null, $topic = null)
    {
        $channel = $this->show($channelId);
        $json['name'] = is_null($name) ? $channel['name'] : $name;
        $json['position'] = is_null($position) ? $channel['position'] : $position;
        $json['topic'] = is_null($topic) ? $channel['topic'] : $topic;

        return $this->request('PATCH', 'channels/' . $channelId, [
            'json' => $json
        ]);
    }

    /**
     * Delete a channel.
     *
     * @param string $channelId
     * @return array
     */
    public function delete($channelId)
    {
        return $this->request('DELETE', 'channels/' . $channelId);
    }

    /**
     * Small wrapper to change the topic only.
     *
     * @param string $channelId
     * @param string $topic
     * @return array
     */
    public function topic($channelId, $topic)
    {
        return $this->edit($channelId, null, null, $topic);
    }

    /**
     * @param string $channelId
     * @return array
     */
    public function show($channelId)
    {
        return $this->request('GET', 'channels/' . $channelId);
    }

    /**
     * @return Invites
     */
    public function invites()
    {
        return new Invites($this->client);
    }

    /**
     * @return Messages
     */
    public function messages()
    {
        return new Messages($this->client);
    }

    /**
     * @return Permissions
     */
    public function permissions()
    {
        return new Permissions($this->client);
    }
}