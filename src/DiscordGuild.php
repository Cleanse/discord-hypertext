<?php
namespace Discord;

use Discord\DiscordHelper;
use Discord\DiscordRole;
use Discord\DiscordGuildMember;
use GuzzleHttp\Exception\RequestException;

class DiscordGuild
{
    protected $client;
    public $id;
    public $name;
    public $icon;
    public $region;
    public $joined_at;
    protected $afk_channel_id;
    protected $afk_timeout;
    protected $embed_channel_id;
    protected $embed_enabled;
    protected $owner_id;
    protected $roles;
    protected $members;
    protected $channels;

    public function __construct($guild, $client)
    {
        $this->client = $client;
        $this->id = $guild->id;
        $this->name = $guild->name;
        $this->icon = $this->setIcon($guild->id, $guild->icon);
        $this->region = $guild->region;
        $this->joined_at = $guild->joined_at;
        $this->afk_channel_id = $guild->afk_channel_id;
        $this->afk_timeout = $guild->afk_timeout;
        $this->embed_channel_id = $guild->embed_channel_id;
        $this->embed_enabled = $guild->embed_enabled;
        $this->owner_id = $guild->owner_id;

        $this->roles = $this->getRoles($guild->roles);
        $this->members = $this->getMembers($guild->id);
        $this->channels = $this->getChannels($guild->id);
    }

    private function setIcon($id, $icon)
    {
        return 'https://discordapp.com/api/guilds/'.$id.'/icons/'.$icon.'.jpg';
    }

    private function getRoles($guildRoles)
    {
        $roles = [];
        foreach($guildRoles as $role)
        {
            $roles[] = new DiscordRole($role);
        }
        return $roles;
    }

    private function getMembers($guild)
    {
        $members = [];
        try {
            $guzzle = new DiscordHelper;
            $request = $guzzle->request('get', 'guilds/'.$guild.'/members', [
                'headers' => [
                    'authorization' => $this->client->token
                ]
            ]);
            $decoded = json_decode($request->getBody()->getContents());
            foreach($decoded as $member) {
                $members[] = new DiscordGuildMember($member);
            }
        } catch (RequestException $e) {
            $members = 'Not authorized.';
        }
        return $members;
    }

    private function getChannels($guild)
    {
        $channels = [];
        try {
            $guzzle = new DiscordHelper;
            $request = $guzzle->request('get', 'guilds/'.$guild.'/channels', [
                'headers' => [
                    'authorization' => $this->client->token
                ]
            ]);

            $decoded = json_decode($request->getBody()->getContents());
            foreach($decoded as $channel) {
                $channels[] = new DiscordChannel($channel);
            }
        } catch (RequestException $e) {
            $channels = 'Not authorized.';
        }
        return $channels;
    }
}