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

class Authentication extends AbstractApi
{
	public function login($email, $password)
    {
        return $this->request('POST', 'auth/login', [
            'json' => [
                'email' => $email,
                'password' => $password
            ]
        ], true);
    }

    public function logout()
    {
        return $this->request('POST', 'auth/logout');
    }

    public function gateway()
    {
        return $this->request('GET', 'gateway');
    }
}