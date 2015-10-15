<?php
namespace Discord\Api;

class User extends AbstractApi
{
    private function setAvatar()
    {
        return 'https://discordapp.com/api/users/'.$this->client->user->id.'/avatars/'.$this->client->user->avatar.'.jpg';
    }

    public function show($userId)
    {
        return $this->get('users/'.$userId);
    }

    public function guilds($userId)
    {
        return $this->request('get', 'users/'.$userId.'/guilds', [
            'headers' => [
                'authorization' => $this->token
            ]
        ]);
    }
}