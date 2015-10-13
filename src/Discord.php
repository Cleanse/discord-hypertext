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

    public function message($channel, $limit = 50, $before = null) //needs try catch
    {
        $params = '?limit='.$limit;
        if(!is_null($before)) {
            $params .= '&before='.$before;
        }
        $guzzle = new DiscordHelper;
        $request = $guzzle->request('get', 'channels/'.$channel.'/messages'.$params, [
            'headers' => [
                'authorization' => $this->client->token
            ]
        ]);
        $decoded = json_decode($request->getBody()->getContents());
        $messages = new DiscordMessage($decoded, $this->client);
        return $decoded;
    }
}