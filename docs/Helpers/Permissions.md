### Permissions Helper
[Back to Helpers](../Helpers.md)

```php
use Discord\Helpers\Permissions;
$permissions = new Permissions();
$permissions->setCreateInstantInvite(bool);
$permissions->setBanMembers(bool);
$permissions->setKickMembers(bool);
$permissions->setManageRoles(bool);
$permissions->setManageChannels(bool);
$permissions->setManageServer(bool);
$permissions->setReadMessages(bool);
$permissions->setSendMessages(bool);
$permissions->setSendTTSMessages(bool);
$permissions->setManageMessages(bool);
$permissions->setEmbedLinks(bool);
$permissions->setAttachFiles(bool);
$permissions->setReadMessageHistory(bool);
$permissions->setMentionEveryone(bool);
$permissions->setVoiceConnect(bool);
$permissions->setVoiceSpeak(bool);
$permissions->setVoiceMuteMembers(bool);
$permissions->setVoiceDeafenMembers(bool);
$permissions->setVoiceMoveMembers(bool);
$permissions->setVoiceUseVoiceActivation(bool);
print_r($permissions->listPermissions());
echo $permissions->finalPermissions();
```

> Note that by default a role is created with the following permissions:
>
- Create Instant Invite
- Read Messages
- Send Messages
- Send TTS Messages
- Embed Links
- Attach Files
- Read Message History
- Mention Everyone
- Voice Connect
- Voice Speak
- Voice Use Voice Activation
>