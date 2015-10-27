<?php
namespace Discord\Api\Guild;

use Discord\Api\AbstractApi;

class Roles extends AbstractApi
{
    public function create(
        $guildId,
        $name,
        $permissions = null,
        $color = null,
        $hoist = false
    ) {
        $newRole = $this->newRole($guildId);
        return $this->edit($guildId, $newRole['id'], $name, $permissions, $color, $hoist);
    }

    public function remove($guildId, $roleId)
    {
        return $this->request('DELETE', 'guilds/' . $guildId . '/roles/' . $roleId);
    }

    public function edit(
        $guildId,
        $roleId,
        $name,
        $permissions = null,
        $color = null,
        $hoist = null
    ) {
        if (is_null($permissions) || is_null($color) || is_null($hoist)) {
            $current = $this->getCurrent($guildId, $roleId);
            is_null($permissions) ? $permissions = $current['permissions'] : $permissions;
            is_null($color) ? $color = $current['color'] : $color;
            is_null($hoist) ? $hoist = $current['hoist'] : $hoist;
        }
        return $this->request('PATCH', 'guilds/' . $guildId . '/roles/' . $roleId, [
            'json' => [
                'name' => $name,
                'color' => $color,
                'permissions' => $permissions,
                'hoist' => $hoist
            ]
        ]);
    }

    private function getCurrent($guildId, $roleId)
    {
        $roles = $this->view($guildId);
        $current = [];
        foreach ($roles as $role) {
            if ($role['id'] = $roleId) {
                $current['permissions'] = $role['permissions'];
                $current['color'] = $role['color'];
                $current['hoist'] = $role['hoist'];
            }
        }
        return $current;
    }

    private function newRole($guildId)
    {
        return $this->request('POST', 'guilds/' . $guildId . '/roles');
    }

    public function view($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/roles');
    }
}