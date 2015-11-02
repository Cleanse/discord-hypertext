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

class Roles extends AbstractApi
{
    /**
     * @param string      $guildId
     * @param string      $name
     * @param string|null $permissions
     * @param string|null $color
     * @param bool|false  $hoist
     * @return array
     */
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

    /**
     * @param string      $guildId
     * @param string      $roleId
     * @param string      $name
     * @param String|null $permissions
     * @param string|null $color
     * @param string|null $hoist
     * @return array
     */
    public function edit(
        $guildId,
        $roleId,
        $name = null,
        $permissions = null,
        $color = null,
        $hoist = null
    ) {
        if (is_null($name) || is_null($permissions) || is_null($color) || is_null($hoist)) {
            $current = $this->getCurrent($guildId, $roleId);
            is_null($name) ? $permissions = $current['name'] : $name;
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

    /**
     * @param string $guildId
     * @param string $roleId
     * @return none
     */
    public function delete($guildId, $roleId)
    {
        return $this->request('DELETE', 'guilds/' . $guildId . '/roles/' . $roleId);
    }

    /**
     * @param string $guildId
     * @return array
     */
    public function show($guildId)
    {
        return $this->request('GET', 'guilds/' . $guildId . '/roles');
    }

    /**
     * @param string $guildId
     * @param string $roleId
     * @return array
     */
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

    /**
     * @param $guildId
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    private function newRole($guildId)
    {
        return $this->request('POST', 'guilds/' . $guildId . '/roles');
    }
}