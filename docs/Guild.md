### Guild API
[Back to main Readme](README.md)

A 'guild' is Discord's name for server.

> Also see:
>
- [Guild Bans](Guild/Bans.md)
- [Guild Channels](Guild/Channels.md)
- [Guild Invites](Guild/Invites.md)
- [Guild Members](Guild/Members.md)
- [Guild Roles](Guild/Roles.md)
>

#### Create Guild

```php
$discord = new Discord($email_address, $password);
$serverName = 'My Server Name';
$region = 'us-west';
$guild = $discord->api('guild')->create($serverName, $region);
print_r($guild);
```

Returns an array with details about your new server.
  
> Full list of [regions](Regions.md)

#### Edit Guild

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$options = [
     'name' => 'My New Guild Name',
     'region' => 'us-east',
     'icon' => 'http://i.imgur.com/a7kEVME.png',
     'afk_channel_id' => '<your_voice_channel_id>'
];
$guild = $discord->api('guild')->edit($guildId, $options);
print_r($guild);
```

Returns an array with your updated server details.

> If you leave any of the option fields out of the array, current values will be auto set for you.

#### Delete Guild

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$discord->api('guild')->delete($guildId);
```

Will not return anything.

#### Show Guild Details

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$guild = $discord->api('guild')->show($guildId);
print_r($guild);
```

Returns an array with details about your new server.

#### Toggle Guild Widget

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$enabled = false;
$channelId = '';
$guild = $discord->api('guild')->widget($guildId, $enabled, $channelId);
print_r($guild);
```

Returns an array with status of the widget.

> Obtaining a list of [Guild Channels](Guild/Channels.md)

#### Guild Icon

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$guildIcon = $discord->api('guild')->icon($guildId);
echo $guildIcon;
```

Returns a string of the url to your guild's icon.