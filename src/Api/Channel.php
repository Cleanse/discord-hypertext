<?php
namespace Discord\Api;

class Channel extends AbstractApi
{
    public function show($guildId)
    {
        return $this->request('GET', 'guilds/'.$guildId.'/channels', [
            'headers' => [
                'authorization' => $this->token
            ]
        ]);
    }
}