<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\Helpers;

use Discord\Helpers\Bitwise;

class Permissions extends Bitwise
{
    const CREATE_INSTANT_INVITE = 0;
    const BAN_MEMBERS = 1;
    const KICK_MEMBERS = 2;
    const MANAGE_ROLES = 3;
    const MANAGE_CHANNELS = 4;
    const MANAGE_SERVER = 5;
    const READ_MESSAGES = 10;
    const SEND_MESSAGES = 11;
    const SEND_TTS_MESSAGES = 12;
    const MANAGE_MESSAGES = 13;
    const EMBED_LINKS = 14;
    const ATTACH_FILES = 15;
    const READ_MESSAGE_HISTORY = 16;
    const MENTION_EVERYONE = 17;
    const VOICE_CONNECT = 20;
    const VOICE_SPEAK = 21;
    const VOICE_MUTE_MEMBERS = 22;
    const VOICE_DEAFEN_MEMBERS = 23;
    const VOICE_MOVE_MEMBERS = 24;
    const VOICE_USE_VOICE_ACTIVATION = 25;

    public function __construct($perms = 36953089)
    {
        $this->flags = $perms;
    }

    public function getCreateInstantInvite()
    {
        return $this->isFlagSet(self::CREATE_INSTANT_INVITE);
    }

    public function setCreateInstantInvite($value = true)
    {
        $this->setFlag(self::CREATE_INSTANT_INVITE, $value);
    }

    public function getBanMembers()
    {
        return $this->isFlagSet(self::BAN_MEMBERS);
    }

    public function setBanMembers($value = false)
    {
        $this->setFlag(self::BAN_MEMBERS, $value);
    }

    public function getKickMembers()
    {
        return $this->isFlagSet(self::KICK_MEMBERS);
    }

    public function setKickMembers($value = false)
    {
        $this->setFlag(self::KICK_MEMBERS, $value);
    }

    public function getManageRoles()
    {
        return $this->isFlagSet(self::MANAGE_ROLES);
    }

    public function setManageRoles($value = false)
    {
        $this->setFlag(self::MANAGE_ROLES, $value);
    }

    public function getManageChannels()
    {
        return $this->isFlagSet(self::MANAGE_CHANNELS);
    }

    public function setManageChannels($value = false)
    {
        $this->setFlag(self::MANAGE_CHANNELS, $value);
    }

    public function getManageServer()
    {
        return $this->isFlagSet(self::MANAGE_SERVER);
    }

    public function setManageServer($value = false)
    {
        $this->setFlag(self::MANAGE_SERVER, $value);
    }

    public function getReadMessages()
    {
        return $this->isFlagSet(self::READ_MESSAGES);
    }

    public function setReadMessages($value)
    {
        $this->setFlag(self::READ_MESSAGES, $value);
    }

    public function getSendMessages()
    {
        return $this->isFlagSet(self::SEND_MESSAGES);
    }

    public function setSendMessages($value)
    {
        $this->setFlag(self::SEND_MESSAGES, $value);
    }

    public function getSendTTSMessages()
    {
        return $this->isFlagSet(self::SEND_TTS_MESSAGES);
    }

    public function setSendTTSMessages($value)
    {
        $this->setFlag(self::SEND_TTS_MESSAGES, $value);
    }

    public function getManageMessages()
    {
        return $this->isFlagSet(self::MANAGE_MESSAGES);
    }

    public function setManageMessages($value)
    {
        $this->setFlag(self::MANAGE_MESSAGES, $value);
    }

    public function getEmbedLinks()
    {
        return $this->isFlagSet(self::EMBED_LINKS);
    }

    public function setEmbedLinks($value)
    {
        $this->setFlag(self::EMBED_LINKS, $value);
    }

    public function getAttachFiles()
    {
        return $this->isFlagSet(self::ATTACH_FILES);
    }

    public function setAttachFiles($value)
    {
        $this->setFlag(self::ATTACH_FILES, $value);
    }

    public function getReadMessageHistory()
    {
        return $this->isFlagSet(self::READ_MESSAGE_HISTORY);
    }

    public function setReadMessageHistory($value)
    {
        $this->setFlag(self::READ_MESSAGE_HISTORY, $value);
    }

    public function getMentionEveryone()
    {
        return $this->isFlagSet(self::MENTION_EVERYONE);
    }

    public function setMentionEveryone($value)
    {
        $this->setFlag(self::MENTION_EVERYONE, $value);
    }

    public function getVoiceConnect()
    {
        return $this->isFlagSet(self::VOICE_CONNECT);
    }

    public function setVoiceConnect($value)
    {
        $this->setFlag(self::VOICE_CONNECT, $value);
    }

    public function getVoiceSpeak()
    {
        return $this->isFlagSet(self::VOICE_SPEAK);
    }

    public function setVoiceSpeak($value)
    {
        $this->setFlag(self::VOICE_SPEAK, $value);
    }

    public function getVoiceMuteMembers()
    {
        return $this->isFlagSet(self::VOICE_MUTE_MEMBERS);
    }

    public function setVoiceMuteMembers($value)
    {
        $this->setFlag(self::VOICE_MUTE_MEMBERS, $value);
    }

    public function getVoiceDeafenMembers()
    {
        return $this->isFlagSet(self::VOICE_DEAFEN_MEMBERS);
    }

    public function setVoiceDeafenMembers($value)
    {
        $this->setFlag(self::VOICE_DEAFEN_MEMBERS, $value);
    }

    public function getVoiceMoveMembers()
    {
        return $this->isFlagSet(self::VOICE_MOVE_MEMBERS);
    }

    public function setVoiceMoveMembers($value)
    {
        $this->setFlag(self::VOICE_MOVE_MEMBERS, $value);
    }

    public function getVoiceUseVoiceActivation()
    {
        return $this->isFlagSet(self::VOICE_USE_VOICE_ACTIVATION);
    }

    public function setVoiceUseVoiceActivation($value)
    {
        $this->setFlag(self::VOICE_USE_VOICE_ACTIVATION, $value);
    }

    public function listPermissions()
    {
        $list = [];
        $this->getCreateInstantInvite() ? $list[] = 'Create Instant Invite' : '';
        $this->getBanMembers() ? $list[] = 'Ban Members' : '';
        $this->getKickMembers() ? $list[] = 'Kick Members' : '';
        $this->getManageRoles() ? $list[] = 'Manage Roles' : '';
        $this->getManageChannels() ? $list[] = 'Manage Channels' : '';
        $this->getManageServer() ? $list[] = 'Manage Server' : '';

        $this->getReadMessages() ? $list[] = 'Read Messages' : '';
        $this->getSendMessages() ? $list[] = 'Send Messages' : '';
        $this->getSendTTSMessages() ? $list[] = 'Send TTS Messages' : '';
        $this->getManageMessages() ? $list[] = 'Manage Messages' : '';
        $this->getEmbedLinks() ? $list[] = 'Embed Links' : '';
        $this->getAttachFiles() ? $list[] = 'Attach Files' : '';
        $this->getReadMessageHistory() ? $list[] = 'Read Message History' : '';
        $this->getMentionEveryone() ? $list[] = 'Mention Everyone' : '';

        $this->getVoiceConnect() ? $list[] = 'Voice Connect' : '';
        $this->getVoiceSpeak() ? $list[] = 'Voice Speak' : '';
        $this->getVoiceMuteMembers() ? $list[] = 'Voice Mute Members' : '';
        $this->getVoiceDeafenMembers() ? $list[] = 'Voice Deafen Members' : '';
        $this->getVoiceMoveMembers() ? $list[] = 'Voice Move Members' : '';
        $this->getVoiceUseVoiceActivation() ? $list[] = 'Voice Use Voice Activation' : '';

        return $list;
    }

    public function finalPermissions()
    {
        return (int)$this->flags;
    }
}