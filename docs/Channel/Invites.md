### Channel Invites API
[Back to the Channel API](../Channel.md)

#### Create Channel Invite

```php
$discord = new Discord($email_address, $password);
$channelId = '<your_guild_id>';
$discord->api('channel')->invites()->create($channelId);
```

Returns an array with invite details.