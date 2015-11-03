### Channel Permissions API
[Back to the Channel API](../Channel.md)

#### Create Channel Permission

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$typeId = '<role_or_member_id>';
$type = 'role'; //member if you wish to target a member
//Let's allow this role kick members in our channel.
$allow = new Permissions(0);
$allow->setKickMembers(true);
//Let's deny this role to mention @everyone.
$deny = new Permissions(0);
$deny->setMentionEveryone(true);
$channelPermission = $discord->api('channel')
    ->permissions()
    ->create($channelId, $typeId, $type, $allow->finalPermissions(), $deny->finalPermissions());
```

Returns an array with the channel permission details.

> It's weird how Discord handles channel permissions. We need to set allow and deny permissions separately.
> Note the `new Permissions(0)`.
> In the deny var, setting the permissions we wish to disallow to `true`.

#### Edit Channel Permission

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$typeId = '<role_or_member_id>';
$type = 'role'; //member if you wish to target a member
//Get current permission values
$current = $discord->api('channel')->permissions()->getCurrent($channelId, $typeId, $type);
//Let's allow this role to also manage the channel.
$allow = new Permissions($current['allow']);
$allow->setManageChannels(true);
$updatedPermissions = $discord->api('channel')
    ->permissions()
    ->edit($channelId, $typeId, $type, $allow->finalPermissions(), null);
```

Returns an array with the updated channel permission details.

> If we leave allow or deny null, the current value will automatically be set for you.

#### Delete Channel Permission

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$typeId = '<role_or_member_id>';
$discord->api('channel')
    ->permissions()
    ->delete($channelId, $typeId);
```

#### Show Channel Permission

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$typeId = '<role_or_member_id>';
$type = 'member';
$channelPermission = $discord->api('channel')
    ->permissions()
    ->show($channelId, $typeId, $type);
```

Returns array with a channel permission.

#### All Channel Permissions

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$allChannelPermissions = $discord->api('channel')
    ->permissions()
    ->all($channelId);
```

Returns array of channel permissions.