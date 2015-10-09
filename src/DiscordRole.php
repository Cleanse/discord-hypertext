<?php
namespace Discord;

class DiscordRole
{
    public $id;
    public $name;
    public $permissions;

    public function __construct($role)
    {
        $this->id = $role->id;
        $this->name = $role->name;
        $this->permissions = $role->permissions;
    }
}