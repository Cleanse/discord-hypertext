### Guild Members API
[Back to the Guild API](../Guild.md)

#### Kick Guild Member

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<kicked_member_id>';
$discord->api('guild')->members()->kick($guildId, $memberId);
```

> This is not permanent. They can rejoin instantly if they get invited back.

#### Redeploy Guild Member

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<member_id>';
$roleIds = ['<role_id>'];
$discord->api('guild')->members()->redeploy($guildId, $memberId, $roleIds);
```

> Will apply new set of roles to specified user.