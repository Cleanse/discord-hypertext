<?php
namespace Discord;

use Discord\DiscordAuthentication;

class Discord
{
    protected $client;

    public function __construct($email, $password)
    {
        $this->client = new DiscordAuthentication($email, $password);
    }

    public function who()
    {
        return $this->client;
    }
}