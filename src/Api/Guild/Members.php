<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Members extends AbstractApi
{
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