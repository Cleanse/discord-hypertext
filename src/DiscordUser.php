<?php
namespace Discord;

use Discord\DiscordGuild;
use Discord\DiscordHelper;

class DiscordUser
{
    protected $user;
    public $id;
    public $email;
    public $username;
    public $avatar;
    public $verified;
    public $guilds;

    public function __construct($user)
    {
        $this->user = $user;
        $this->id = $this->user->user->id;
        $this->email = $this->user->user->email;
        $this->username = $this->user->user->username;
        $this->avatar = $this->getAvatar();
        $this->verified = $this->user->user->verified;

        $this->guilds = $this->guilds();
    }

    private function getAvatar()
    {
        return 'https://discordapp.com/api/users/'.$this->user->user->id.'/avatars/'.$this->user->user->avatar.'.jpg';
    }

    public function guilds()
    {
        $guzzle = new DiscordHelper;
        $request = $guzzle->request('get', 'users/'.$this->user->user->id.'/guilds', [
            'headers' => [
                'authorization' => $this->user->token
            ]
        ]);
        $decoded = json_decode($request->getBody()->getContents());
        $guilds = [];
        foreach($decoded as $guild)
        {
            $guilds[] = new DiscordGuild($guild, $this->user);
        }
        return $guilds;
    }
}