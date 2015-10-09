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
    public $afk_channel_id;
    public $afk_timeout;
    public $embed_channel_id;
    public $embed_enabled;
    public $owner_id;
    public $roles;
    public $members;

    public function __construct($guild, $client)
    {
        $this->client = $client;
        $this->id = $guild->id;
        $this->name = $guild->name;
        $this->icon = $this->getIcon($guild->id, $guild->icon);
        $this->region = $guild->region;
        $this->joined_at = $guild->joined_at;
        $this->afk_channel_id = $guild->afk_channel_id;
        $this->afk_timeout = $guild->afk_timeout;
        $this->embed_channel_id = $guild->embed_channel_id;
        $this->embed_enabled = $guild->embed_enabled;
        $this->owner_id = $guild->owner_id;

        $this->roles = $this->getRoles($guild->roles);
        $this->members = $this->getMembers($guild->id);
    }

    private function getIcon($id, $icon)
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
}