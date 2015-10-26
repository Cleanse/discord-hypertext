<?php
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