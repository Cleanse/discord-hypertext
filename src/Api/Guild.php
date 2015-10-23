<?php
namespace Discord\Api;

use Discord\Api\Guild\Bans;
use Discord\Api\Guild\Invite;
use Discord\Api\Guild\Member;
use Discord\Api\Guild\Role;

class Guild extends AbstractApi
{
    public function create($name, $region)
    {
        return $this->request('POST', 'guilds', [
            'headers' => ['authorization' => $this->token],
            'json' => ['name' => $name, 'region' => $region]
        ]);
    }

    public function leave($guildId)
    {
        return $this->request('DELETE', 'guilds/' . $guildId, [
            'headers' => ['authorization' => $this->token]
        ]);
    }

    /*
     * {name: <string, required>, afk_channel_id: <id>, region: <region_name>, icon: <url_path/file_path>} are all you can change?
     */
    public function edit($guildId, $array = [])
    {
        $guild = $this->show($guildId);
        $json['name'] = isset($array['name']) ? $array['name'] : $guild['name'];
        $json['region'] = isset($array['region']) ? $array['region'] : $guild['region'];
        $json['icon'] = isset($array['icon']) ? $this->encodeIcon($array['icon']) : $guild['icon'];
        $json['afk_channel_id'] = isset($array['afk_channel_id']) ? $array['afk_channel_id'] : $guild['afk_channel_id'];

        return $this->request('PATCH', 'guilds/' . $guildId, [
            'headers' => ['authorization' => $this->token],
            'json' => $json
        ]);
    }

    public function encodeIcon($image)
    {
        $type = pathinfo($image, PATHINFO_EXTENSION);
        $data = file_get_contents($image);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    /*
     * {enabled: <boolean>, channel_id: <id>}
     */
    public function widget($guildId, $enabled, $channelId)
    {
        return $this->request('PATCH', 'guilds/' . $guildId . '/embed', [
            'headers' => ['authorization' => $this->token],
            'json' => [
                'channel_id' => $channelId,
                'enabled' => $enabled
            ]
        ]);
    }

    public function show($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId, [
            'headers' => ['authorization' => $this->token]
        ]);
    }

    public function icon($guildId)
    {
        $guild = $this->show($guildId);

        return 'https://discordapp.com/api/guilds/' . $guildId . '/icons/' . $guild['icon'] . '.jpg';
    }

    public function roles()
    {
        return new Role($this->client);
    }

    public function members()
    {
        return new Member($this->client);
    }

    public function bans()
    {
        return new Bans($this->client);
    }

    public function invites()
    {
        return new Invite($this->client);
    }
}