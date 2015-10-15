<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Invite extends AbstractApi
{
    public function get($guildId)
    {
        //POST https://discordapp.com/api/invite/:id_or_xkcd
    }

    public function create()
    {
        //PUT https://discordapp.com/api/channels/:id/invites
    }

    public function accept()
    {
        //POSTs https://discordapp.com/api/invite/:id
    }

    public function delete()
    {
        //DELETE https://discordapp.com/api/invite/:id
    }
}