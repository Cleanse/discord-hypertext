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

use Discord\Api\Guild\Bans;
use Discord\Api\Guild\Channels;
use Discord\Api\Guild\Invites;
use Discord\Api\Guild\Members;
use Discord\Api\Guild\Roles;
use Discord\Helpers\Image;

class Guild extends AbstractApi
{
    /*
     * Create a new guild.
     *
     * @param string $name Required
     * @param string $region <us-west is the default, use api('region')->show(); for the full list.>
     *
     * @return array
     */
    public function create($name, $region = 'us-west')
    {
        return $this->request('POST', 'guilds', [
            'json' => [
                'name' => $name,
                'region' => $region
            ]
        ]);
    }

    /*
     * Edit a guild.
     *
     * @param string $guildId Required
     * @param array  $options [
     *      @property string   $name
     *      @property string   $region
     *      @property file|url $icon
     *      @property string   $afk_channel_id
     * ]
     *
     * @return array
     */
    public function edit($guildId, $options = [])
    {
        $image = new Image();
        $guild = $this->show($guildId);
        $json['name'] = isset($options['name']) ? $options['name'] : $guild['name'];
        $json['region'] = isset($options['region']) ? $options['region'] : $guild['region'];
        $json['icon'] = isset($options['icon']) ? $image->encodeImage($options['icon']) : $guild['icon'];
        $json['afk_channel_id'] = isset($options['afk_channel_id']) ? $options['afk_channel_id'] : $guild['afk_channel_id'];

        return $this->request('PATCH', 'guilds/' . $guildId, [
            'json' => $json
        ]);
    }

    /*
     * Delete a guild.
     *
     * @param string $guildId Required
     */
    public function delete($guildId)
    {
        return $this->request('DELETE', 'guilds/' . $guildId);
    }

    /*
     * View a guild.
     *
     * @param string $guildId Required
     *
     * @return array
     */
    public function show($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId);
    }

    /*
     * Toggle guild widget.
     *
     * @param string $guildId Required
     * @param bool $enabled default: false
     * @param string $channelId default: false
     *
     * @return array
     */
    public function widget($guildId, $enabled ='false', $channelId = '')
    {
        return $this->request('PATCH', 'guilds/' . $guildId . '/embed', [
            'json' => [
                'channel_id' => $channelId,
                'enabled' => $enabled
            ]
        ]);
    }

    /*
     * View a guild's icon.
     *
     * @param string $guildId Required
     *
     * @return string
     */
    public function icon($guildId)
    {
        $guild = $this->show($guildId);
        return 'https://discordapp.com/api/guilds/' . $guildId . '/icons/' . $guild['icon'] . '.jpg';
    }

    /**
     * @return Bans
     */
    public function bans()
    {
        return new Bans($this->client);
    }

    /**
     * @return Channels
     */
    public function channels()
    {
        return new Channels($this->client);
    }

    /**
     * @return Invites
     */
    public function invites()
    {
        return new Invites($this->client);
    }

    /**
     * @return Members
     */
    public function members()
    {
        return new Members($this->client);
    }

    /**
     * @return Roles
     */
    public function roles()
    {
        return new Roles($this->client);
    }
}