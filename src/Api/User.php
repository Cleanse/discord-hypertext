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

    public function me()
    {
        return $this->request('GET', 'users/@me');
    }

    public function show($userId)
    {
        return $this->request('get', 'users/' . $userId);
    }

    public function guilds($userId)
    {
        return $this->request('get', 'users/' . $userId . '/guilds');
    }

    public function avatar($userId)
    {
        $user = $this->show($userId);
        return 'https://discordapp.com/api/users/' . $userId . '/avatars/' . $user['avatar'] . '.jpg';
    }
}
