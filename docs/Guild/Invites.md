### Guild Invites API
[Back to the Guild API](../Guild.md)

#### Show Guild Invites List

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$guildInvites = $discord->api('guild')->invites()->show($guildId);
print_r($guildInvites);
```

Returns an array with the list of invites.