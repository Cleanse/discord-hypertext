<?php
namespace Discord;

class DiscordGuildMember
{
    public $joined_at;
    public $user;
    public $roles;
    public $deaf;
    public $mute;

    public function __construct($member)
    {
        $this->joined_at = $member->joined_at;
        $this->user = $member->user;
        $this->roles = $member->roles;
        $this->deaf = $member->deaf;
        $this->mute = $member->mute;
    }
}