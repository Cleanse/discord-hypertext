<?php
namespace Discord;

use Discord\DiscordAuthentication;

class Discord
{
    public $client;

    public function __construct($email, $password)
    {
        $this->client = new DiscordAuthentication($email, $password);
    }

    public function user()
    {
        $user = new DiscordUser($this->client);
        return $user;
    }

    public function guild($guildId)
    {
        $guzzle = new DiscordHelper;
        $request = $guzzle->request('get', 'guilds/'.$guildId, [
            'headers' => [
                'authorization' => $this->client->token
            ]
        ]);
        $decoded = json_decode($request->getBody()->getContents());
        $guild = new DiscordGuild($decoded, $this->client);
        return $guild;
    }

    public function channel()
    {
        //to do
    }
}