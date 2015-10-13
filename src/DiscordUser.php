<?php
namespace Discord;

use Discord\DiscordGuild;
use Discord\DiscordHelper;

class DiscordUser
{
    protected $client;
    public $id;
    public $username;
    public $avatar;
    public $guilds;
    protected $email;
    protected $verified;

    public function __construct($user)
    {
        $this->client = $user;

        $this->id = $this->client->user->id;
        $this->email = $this->client->user->email;
        $this->username = $this->client->user->username;
        $this->avatar = $this->setAvatar();
        $this->verified = $this->client->user->verified;

        $this->guilds = $this->guilds();
    }

    private function setAvatar()
    {
        return 'https://discordapp.com/api/users/'.$this->client->user->id.'/avatars/'.$this->client->user->avatar.'.jpg';
    }

    public function guilds()
    {
        $guzzle = new DiscordHelper;
        $request = $guzzle->request('get', 'users/'.$this->client->user->id.'/guilds', [
            'headers' => [
                'authorization' => $this->client->token
            ]
        ]);
        $decoded = json_decode($request->getBody()->getContents());
        $guilds = [];
        foreach($decoded as $guild)
        {
            $guilds[] = new DiscordGuild($guild, $this->client);
        }
        return $guilds;
    }
}