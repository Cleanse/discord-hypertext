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
}