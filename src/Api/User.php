<?php
namespace Discord\Api;

class User extends AbstractApi
{
    public function edit($username = null, $new_password = null, $avatar = null)
    {
        $me = $this->me();
        $json['username'] = is_null($username) ? $me['username'] : $username;
        $json['avatar'] = is_null($avatar) ? $me['avatar'] : $this->encodeAvatar($avatar);
        $json['email'] = getenv('DISCORD_EMAIL');
        $json['password'] = getenv('DISCORD_PASSWORD');
        $json['new_password'] = is_null($new_password) ? '' : $new_password;
        return $this->request('PATCH', 'users/@me', [
            'json' => $json
        ]);
    }

    private function encodeAvatar($image)
    {
        $type = pathinfo($image, PATHINFO_EXTENSION);
        $data = file_get_contents($image);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    public function me()
    {
        return $this->request('GET', 'users/@me');
    }

    public function view($userId)
    {
        return $this->request('get', 'users/' . $userId);
    }

    public function guilds($userId)
    {
        return $this->request('get', 'users/' . $userId . '/guilds');
    }

    public function avatar($userId)
    {
        $user = $this->view($userId);
        return 'https://discordapp.com/api/users/' . $userId . '/avatars/' . $user['avatar'] . '.jpg';
    }
}
