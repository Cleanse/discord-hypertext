<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Role extends AbstractApi
{
    public function all($guildId)
    {
        return $this->request('GET', 'guilds/'.$guildId.'/roles', [
            'headers' => [
                'authorization' => $this->token
            ]
        ]);
    }

    public function add($guildId, $array)
    {
        //PUT https://discordapp.com/api/guilds/:id/bans
    }

    public function remove($guildId, $array)
    {
        //DELETE https://discordapp.com/api/guilds/:id/bans
    }
}