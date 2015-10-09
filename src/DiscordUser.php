<?php
namespace Discord;

use Discord\DiscordGuild;

class DiscordUser
{
    protected $client;
    public $user;

    public function __construct($client)
    {
        $this->client = $client;
        $this->user = $client->user;
        $this->user->avatar = $this->getAvatar();
    }

    private function getAvatar()
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
            $guilds[] = new DiscordGuild($guild->id, $guild->name, $this->client);
        }
        return $guilds;
    }
}