<?php
namespace Discord;

use Exception;
use Discord\DiscordHelper;

class DiscordAuthentication
{
    protected $token;
    protected $user;

    public function __construct($email, $password)
    {
        $this->login($email, $password);
    }

    private function login($email, $password)
    {
        $this->getToken($email, $password);
        $this->getUser();
    }

    private function getToken($email, $password)
    {
        $guzzle = new DiscordHelper;
        try {
            $response = $guzzle->request('post', 'auth/login', [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode([
                    'email' => $email,
                    'password' => $password
                ])
            ]);
        } catch (Exception $e) {
            throw new Exception($e);
        }

        $decoded = json_decode($response->getBody()->getContents());
        if(!@$decoded->token) {
            throw new Exception('The login attempt failed.');
        }
        $this->token = $decoded->token;
    }

    private function getUser()
    {
        $guzzle = new DiscordHelper;
        try {
            $response = $guzzle->request('get', 'users/@me', [
                'headers' => [
                    'authorization' => $this->token
                ]
            ]);
        } catch (Exception $e) {
            throw new DiscordLoginFailedException($e->getMessage());
        }
        $this->user = json_decode($response->getBody()->getContents());
    }

    public function logout()
    {
        $guzzle = new DiscordHelper;
        try {
            $guzzle->request('post', 'auth/logout');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return true;
    }
}