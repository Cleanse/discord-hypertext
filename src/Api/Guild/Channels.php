<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Channels extends AbstractApi
{
    public function view($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/channels');
    }
}

