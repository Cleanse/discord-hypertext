### Invite API
[Back to main Readme](README.md)

#### Accept Guild Invite

```php
$discord = new Discord($email_address, $password);
$inviteId = '<invite_id>';
print_r($discord->api('invite')->accept($inviteId));
```

Returns an array with your new guild.

#### Delete Guild Invite (Revoke Invite Link/Key)

```php
$discord = new Discord($email_address, $password);
$inviteId = '<invite_id>';
print_r($discord->api('invite')->delete($inviteId));
```

Returns an array of the deleted invite link/token.