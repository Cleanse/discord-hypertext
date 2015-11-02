### Guild Channels API
[Back to the Guild API](../Guild.md)

#### Show Guild Channels

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$guildChannels = $discord->api('guild')->channels()->show($guildId);
print_r($guildChannels);
```

Returns an array with details about your guild's channels.