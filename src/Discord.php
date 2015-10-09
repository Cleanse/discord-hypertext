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

    public function guild()
    {
        $user = new DiscordGuild($this->client);
        return $user;
    }

    public function channel()
    {
        //to do
    }
}