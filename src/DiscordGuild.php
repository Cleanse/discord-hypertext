<?php
namespace Discord;

class DiscordGuild
{
    public $id;
    public $name;
    protected $client;

    public function __construct($id, $name, $client)
    {
        $this->id = $id;
        $this->name = $name;
        $this->client = $client;
    }
}