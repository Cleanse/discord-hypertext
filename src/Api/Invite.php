<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\Api;

class Invite extends AbstractApi
{
    /**
     * @param string $inviteId
     * @return array
     */
    public function accept($inviteId)
    {
        return $this->request('POST', 'invite/'.$inviteId);
    }

    /**
     * @param string $inviteId
     * @return array
     */
    public function delete($inviteId)
    {
        return $this->request('DELETE', 'invite/'.$inviteId);
    }
}