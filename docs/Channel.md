### Channel API
[Back to main Readme](README.md)

> Also see:
>
- [Channel Invites](Channel/Invites.md)
- [Channel Messages](Channel/Messages.md)
- [Channel Permissions](Channel/Permissions.md)
>

#### Create Channel

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$channelName = 'My Channel Name';
$type = 'voice';
$channel = $discord->api('channel')->create($guildId, $channelName, $type);
print_r($channel);
```

Returns channel array.

> Type is optional. Will default to a text channel.

#### Edit Channel

```php
$discord = new Discord($email_address, $password);
$channelId = '<your_channel_id>';
$channelName = 'My New Channel Name';
//Set channel position to top
$position = 0;
$topic = 'Welcome to the NEW channel.';
$channel = $discord->api('channel')->edit($channelId, $channelName, $position, $topic);
print_r($channel);
```

Returns the updated channel array.

> All but channel id are optional. Set to null if you do not wish to change a field.

#### Delete Channel

```php
$discord = new Discord($email_address, $password);
$channelId = '<your_channel_id>';
$discord->api('channel')->delete($channelId);
```

#### Set Channel Topic

```php
$discord = new Discord($email_address, $password);
$channelId = '<your_channel_id>';
$topic = 'Cleanse on github.';
$discord->api('channel')->topic($channelId, $topic);
```

Returns the updated channel array.

> This is just a wrapper for the edit function.

#### Show Channel Information

```php
$discord = new Discord($email_address, $password);
$channelId = '<your_channel_id>';
$discord->api('channel')->show($channelId);
```

Returns the specified channel array.