### Guild Roles API
[Back to the Guild API](../Guild.md)

#### Create Guild Role

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$roleName = 'My Role Name';
$permissions = new Permissions();
//let's remove the ability for this role to create invite links.
$permissions->setCreateInstantInvite(false);
$color = new RoleColors();
//Let's set a red color to this role
$roleColor = $color->darkRed;
//Set this role to be grouped on it's own on the sidebar.
$hoist = true;
$discord->api('guild')->roles()->create($guildId, $roleName, $permissions->finalPermissions(), $roleColor, $hoist);
```

Returns an array of the Role's details.

> Read more on how to use [helpers](../Helpers.md).

#### Edit Guild Role

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$roleId = '<your_guild_role_id>';
$roleName = 'My New Role Name';
$permissions = new Permissions();
//let's allow this role to kick members.
$permissions->setKickMembers(true);
$discord->api('guild')->roles()->edit($guildId, $roleId, $roleName, $permissions->finalPermissions(), null, null);
```

Returns an array of the edited Role's details.

> Fields 3, 4, 5, 6 are optional. Leave a null in place of the param you do not wish to modify.

#### Delete Guild Role

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$roleId = '<your_guild_role_id>';
$discord->api('guild')->roles()->delete($guildId, $roleId);
```

#### Show Guild Roles

```php
$discord = new Discord($email_address, $password);
$guildId = '<your_guild_id>';
$discord->api('guild')->roles()->show($guildId);
```

Returns an array of the guild's roles.