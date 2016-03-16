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

use Discord\Helpers\Image;

class User extends AbstractApi
{
    /**
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    public function me()
    {
        return $this->request('GET', 'users/@me');
    }

    /**
     * @param $userId
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    public function show($userId)
    {
        return $this->request('get', 'users/' . $userId);
    }

    /**
     * @param $email
     * @param $password
     * @param null $username
     * @param null $new_password
     * @param null $avatar
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    public function edit($email, $password, $username = null, $new_password = null, $avatar = null)
    {
        $image = new Image();
        $me = $this->me();
        $json['username'] = is_null($username) ? $me['username'] : $username;
        $json['avatar'] = is_null($avatar) ? $me['avatar'] : $image->encodeImage($avatar);
        $json['email'] = $email;
        $json['password'] = $password;
        $json['new_password'] = is_null($new_password) ? '' : $new_password;
        return $this->request('PATCH', 'users/@me', [
            'json' => $json
        ]);
    }

    /**
     * Leave a guild
     * @param $guildId
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    public function delete($guildId)
    {
        return $this->request('DELETE', 'users/@me/guilds/' . $guildId);
    }

    /**
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    public function guilds()
    {
        return $this->request('get', 'users/@me/guilds');
    }

    /**
     * @param $userId
     * @return string
     */
    public function avatar($userId)
    {
        $user = $this->show($userId);
        return 'https://discordapp.com/api/users/' . $userId . '/avatars/' . $user['avatar'] . '.jpg';
    }

    public function createChannel($userId)
    {
        return $this->request('POST', 'users/@me/channels', [
            'json' => [
                'recipient_id' => $userId
            ]
        ]);
    }
    
    /* Friends Canary */
    public function getRelationships()
    {
        return $this->request('get', 'users/@me/relationships');
    }
    
    public function getMutualFriends($userId)
    {
        return $this->request('get', 'users/' . $userId . '/relationships');
    }
    
    public function addFriend($userId)
    {
        return $this->request('put', 'users/@me/relationships/' . $userId);
    }
    
    public function blockUser($userId)
    {
        return $this->request('put', 'users/@me/relationships/' . $userId, [
            'json' => [
                'type' => 2
            ]
        ]);
    }
    
    public function removeFriend($userId)
    {
        return $this->request('delete', 'users/@me/relationships/' . $userId);
    }
}
