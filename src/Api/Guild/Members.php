<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Members extends AbstractApi
{
    public function view($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/members');
    }

    /*
     * Adds member to roles.
     *
     * @param int $guildId
     * @param int $memberId
     * @param array $roleIds
     */
    public function promote($guildId, $memberId, $roleIds = [])
    {
        return $this->request('PATCH', 'guilds/' . $guildId . '/members/' . $memberId, [
            'json' => [
                'roles' => $roleIds
            ]
        ]);
    }

    /*
     * Remove member to roles.
     *
     * @param int $guildId
     * @param int $memberId
     * @param array $roleIds
     */
    public function demote($guildId, $memberId, $roleIds = [])
    {
        $this->promote($guildId, $memberId, $roleIds);
    }

    public function kick($guildId, $memberId)
    {
        $this->rank($guildId, $memberId);
        return $this->request('DELETE', 'guilds/' . $guildId . '/members/' . $memberId);
    }
}