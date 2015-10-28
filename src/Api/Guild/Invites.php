<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Invites extends AbstractApi
{
    public function view($guildId)
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