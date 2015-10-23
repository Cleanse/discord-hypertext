<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;
use Discord\Helpers\Permissions;

class Role extends AbstractApi
{
    public function all($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/roles', [
            'headers' => [
                'authorization' => $this->token
            ]
        ]);
    }

    public function create($guildId, $name, $array = [])
    {
        $newRole = $this->newRole($guildId);
        return $this->edit($guildId, $newRole['id'], $name, $array);
    }

    public function remove($guildId, $roleId)
    {
        return $this->request('DELETE', 'guilds/' . $guildId . '/roles/' . $roleId, [
            'headers' => ['authorization' => $this->token]
        ]);
    }

    /*
     * {"name":"@admin","permissions":36953121,"color":0,"hoist":false}
     */
    public function edit($guildId, $roleId, $name, $permissions = [], $array = [])
    {
        $json['name'] = $name;
        $json['permissions'] = $permissions;
        $json = array_merge($json, $array);
        return $this->request('PATCH', 'guilds/' . $guildId . '/roles/' . $roleId, [
            'headers' => ['authorization' => $this->token],
            'json' => $json
        ]);
    }

    protected function newRole($guildId)
    {
        return $this->request('POST', 'guilds/' . $guildId . '/roles', [
            'headers' => ['authorization' => $this->token]
        ]);
    }
}