<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Member extends AbstractApi
{
    public function all($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/members');
    }

    public function edit()
    {
        //
    }

    public function kick()
    {
        //
    }
}