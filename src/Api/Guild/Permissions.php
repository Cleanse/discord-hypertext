<?php
namespace Discord\Api\Guild;

use Discord\Api\Guild\Bitwise;

class Permissions extends Bitwise
{
    public function __construct($perms = null)
    {
        $this->flags = $perms;
    }

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

    /*public $perms;

    public function __construct($permissions)
    {
        $this->perms = $permissions;
    }*/

    public function getCreateInstantInvite(){
        return $this->isFlagSet(self::CREATE_INSTANT_INVITE);
    }
    public function setCreateInstantInvite($value){
        $this->setFlag(self::CREATE_INSTANT_INVITE, $value);
    }

    public function getBanMembers(){
        return $this->isFlagSet(self::BAN_MEMBERS);
    }
    public function setBanMembers($value){
        $this->setFlag(self::BAN_MEMBERS, $value);
    }

    public function getKickMembers(){
        return $this->isFlagSet(self::KICK_MEMBERS);
    }
    public function setKickMembers($value){
        $this->setFlag(self::KICK_MEMBERS, $value);
    }

    public function getManageRoles(){
        return $this->isFlagSet(self::MANAGE_ROLES);
    }
    public function setManageRoles($value){
        $this->setFlag(self::MANAGE_ROLES, $value);
    }

    public function getManageChannels(){
        return $this->isFlagSet(self::MANAGE_CHANNELS);
    }
    public function setManageChannels($value){
        $this->setFlag(self::MANAGE_CHANNELS, $value);
    }

    public function getManageServer(){
        return $this->isFlagSet(self::MANAGE_SERVER);
    }
    public function setManageServer($value){
        $this->setFlag(self::MANAGE_SERVER, $value);
    }

    public function getReadMessages(){
        return $this->isFlagSet(self::READ_MESSAGES);
    }
    public function setReadMessages($value){
        $this->setFlag(self::READ_MESSAGES, $value);
    }

    public function getSendMessages(){
        return $this->isFlagSet(self::SEND_MESSAGES);
    }
    public function setSendMessages($value){
        $this->setFlag(self::SEND_MESSAGES, $value);
    }

    public function getSendTTSMessages(){
        return $this->isFlagSet(self::SEND_TTS_MESSAGES);
    }
    public function setSendTTSMessages($value){
        $this->setFlag(self::SEND_TTS_MESSAGES, $value);
    }

    public function getManageMessages(){
        return $this->isFlagSet(self::MANAGE_MESSAGES);
    }
    public function setManageMessages($value){
        $this->setFlag(self::MANAGE_MESSAGES, $value);
    }

    public function getEmbedLinks(){
        return $this->isFlagSet(self::EMBED_LINKS);
    }
    public function setEmbedLinks($value){
        $this->setFlag(self::EMBED_LINKS, $value);
    }

    public function getAttachFiles(){
        return $this->isFlagSet(self::ATTACH_FILES);
    }
    public function setAttachFiles($value){
        $this->setFlag(self::ATTACH_FILES, $value);
    }

    public function getReadMessageHistory(){
        return $this->isFlagSet(self::READ_MESSAGE_HISTORY);
    }
    public function setReadMessageHistory($value){
        $this->setFlag(self::READ_MESSAGE_HISTORY, $value);
    }

    public function getMentionEveryone(){
        return $this->isFlagSet(self::MENTION_EVERYONE);
    }
    public function setMentionEveryone($value){
        $this->setFlag(self::MENTION_EVERYONE, $value);
    }

    public function getVoiceConnect(){
        return $this->isFlagSet(self::VOICE_CONNECT);
    }
    public function setVoiceConnect($value){
        $this->setFlag(self::VOICE_CONNECT, $value);
    }

    public function getVoiceSpeak(){
        return $this->isFlagSet(self::VOICE_SPEAK);
    }
    public function setVoiceSpeak($value){
        $this->setFlag(self::VOICE_SPEAK, $value);
    }

    public function getVoiceMuteMembers(){
        return $this->isFlagSet(self::VOICE_MUTE_MEMBERS);
    }
    public function setVoiceMuteMembers($value){
        $this->setFlag(self::VOICE_MUTE_MEMBERS, $value);
    }

    public function getVoiceDeafenMembers(){
        return $this->isFlagSet(self::VOICE_DEAFEN_MEMBERS);
    }
    public function setVoiceDeafenMembers($value){
        $this->setFlag(self::VOICE_DEAFEN_MEMBERS, $value);
    }

    public function getVoiceMoveMembers(){
        return $this->isFlagSet(self::VOICE_MOVE_MEMBERS);
    }
    public function setVoiceMoveMembers($value){
        $this->setFlag(self::VOICE_MOVE_MEMBERS, $value);
    }

    public function getVoiceUseVoiceActivation(){
        return $this->isFlagSet(self::VOICE_USE_VOICE_ACTIVATION);
    }
    public function setVoiceUseVoiceActivation($value){
        $this->setFlag(self::VOICE_USE_VOICE_ACTIVATION, $value);
    }

    //[36953121]
    public function __toString(){
        return '[' .
        ($this->getCreateInstantInvite() ? 'InstaInv ' : '') .
        ($this->getBanMembers() ? 'BanMems ' : '') .
        ($this->getKickMembers() ? 'KickMems ' : '') .
        ($this->getManageRoles() ? 'ManRoles ' : '') .
        ($this->getManageChannels() ? 'ManChans ' : '') .
        ($this->getManageServer() ? 'ManServ ' : '') .

        ($this->getReadMessages() ? 'ReadMess ' : '') .
        ($this->getSendMessages() ? 'SendMess ' : '') .
        ($this->getSendTTSMessages() ? 'SendTTS ' : '') .
        ($this->getManageMessages() ? 'ManMess ' : '') .
        ($this->getEmbedLinks() ? 'EmbLink ' : '') .
        ($this->getAttachFiles() ? 'AttFiles ' : '') .
        ($this->getReadMessageHistory() ? 'ReadMessHist ' : '') .
        ($this->getMentionEveryone() ? 'MenEveryone ' : '') .

        ($this->getVoiceConnect() ? 'VConn' : '') .
        ($this->getVoiceSpeak() ? 'VSpeak' : '') .
        ($this->getVoiceMuteMembers() ? 'VMute' : '') .
        ($this->getVoiceDeafenMembers() ? 'VDeaf' : '') .
        ($this->getVoiceMoveMembers() ? 'VMove' : '') .
        ($this->getVoiceUseVoiceActivation() ? 'VActivate' : '') .
        ']';
    }
}