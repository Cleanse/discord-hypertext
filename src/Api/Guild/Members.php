<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Members extends AbstractApi
{
    /**
     * @param string $guildId
     * @return array
     */
    public function show($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/members');
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
    public function promote($guildId, $memberId, $roleIds)
    {
        $newRoles = $this->modRoles($guildId, $memberId, $roleIds);
        return $this->request('PATCH', 'guilds/' . $guildId . '/members/' . $memberId, [
            'json' => [
                'roles' => $newRoles
            ]
        ]);
    }

    /**
     * @param $guildId
     * @param $memberId
     * @param $roleIds
     * @param bool|false $all
     * @return none
     */
    public function demote($guildId, $memberId, $roleIds = [], $all = false)
    {
        if ($all) {
            $newRoles = [];
        } else {
            $newRoles = $this->modRoles($guildId, $memberId, $roleIds, false);
        }
        return $this->request('PATCH', 'guilds/' . $guildId . '/members/' . $memberId, [
            'json' => [
                'roles' => $newRoles
            ]
        ]);
    }

    /**
     * @param string $guildId
     * @param string $memberId
     * @return array
     */
    public function memberRoles($guildId, $memberId)
    {
        $guildMembers = $this->show($guildId);
        foreach ($guildMembers as $member) {
            if ($member['user']['id'] == $memberId) {
                return $member['roles'];
            }
        }
        return [];
    }

    /**
     * @param $guildId
     * @param $memberId
     * @param $roles
     * @param bool|true $add
     * @return array
     */
    private function modRoles($guildId, $memberId, $roles, $add = true)
    {
        $guildMembersRoles = $this->memberRoles($guildId, $memberId);
        if ($add) {
            $updatedRoles = array_keys(array_flip(array_merge($guildMembersRoles, $roles)));
        } else {
            $updatedRoles = array_keys(array_flip(array_diff($guildMembersRoles, $roles)));
        }
        return $updatedRoles;
    }
}