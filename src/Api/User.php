<?php
namespace Discord\Api;

class User extends AbstractApi
{
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
