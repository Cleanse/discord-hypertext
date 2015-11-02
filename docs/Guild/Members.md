### Guild Members API
[Back to the Guild API](../Guild.md)

#### Show Guild Members List

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$guildMembers = $discord->api('guild')->members()->show($guildId);
print_r($guildMembers);
```

Returns an array with the list of members.

#### Kick Guild Member

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<kicked_member_id>';
$discord->api('guild')->members()->kick($guildId, $memberId);
```

> This is not permanent. They can rejoin instantly if they get invited back.

#### Promote Guild Member / Add Role(s) to Member

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<member_id>';
$roleIds = ['<role_id>'];
$discord->api('guild')->members()->promote($guildId, $memberId, $roleIds);
```

> Will merge current ranks.

#### Demote Guild Member / Remove Role(s) from Member

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<member_id>';
$roleIds = []; //leave empty if doing a full demotion
$removeAllRanks = true;
$discord->api('guild')->members()->demote($guildId, $memberId, $roleIds, $removeAllRanks);
```

> If you enter Role IDs, roles will be set to the diff. Fourth param by default is false.

> If you set the fourth parameter to true, leave the third an empty array and all roles will be removed.

#### Show A Member's Role

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$memberId = '<member_id>';
$discord->api('guild')->members()->memberRoles($guildId, $memberId);
```

Returns an array of said member's roles.