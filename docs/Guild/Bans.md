### Guild Bans API
[Back to the Guild API](../Guild.md)

#### Create Guild Ban

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<id_of_member_to_ban>';
$messageHistoryDays = 2;
$discord->api('guild')->bans()->create($guildId, $memberId, $messageHistoryDays);
```

#### Delete Guild Ban

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<id_of_member_to_ban>';
$discord->api('guild')->bans()->delete($guildId, $memberId);
```

#### Show Guild Ban List

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$guildBans = $discord->api('guild')->bans()->show($guildId);
print_r($guildBans);
```

Returns an array with the list of bans.
