<?php
namespace Discord\Api;

class Authentication extends AbstractApi
{
	public function login($email, $password)
    {
        return $this->request('POST', 'auth/login', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode([
                'email' => $email,
                'password' => $password
            ])
        ]);
    }
}