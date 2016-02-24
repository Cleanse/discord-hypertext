<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Members extends AbstractApi
{
    /**
     * View a guild member list.
     *
     * @param $guildId
     * @param int $limit
     * @param int $offset
     * @return mixed|\Psr\Http\Message\StreamInterface
     */

    public function show($guildId, $limit = 50, $offset = 0)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/members?limit=' . $limit . '&offset=' . $offset);
    }

    /**
     * @param $guildId
     * @param $userId
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    public function member($guildId, $userId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/members/' . $userId);
    }

    /**
     * @param $guildId
     * @param $memberId
     * @return empty
     */
    public function kick($guildId, $memberId)
    {
        return $this->request('DELETE', 'guilds/' . $guildId . '/members/' . $memberId);
    }

    /**
     * @param $guildId
     * @param $memberId
     * @param $roleIds
     * @return none
     */
    public function redeploy($guildId, $memberId, $roleIds = [])
    {
        return $this->request('PATCH', 'guilds/' . $guildId . '/members/' . $memberId, [
            'json' => [
                'roles' => $roleIds
            ]
        ]);
    }
}