# discord-php
An unofficial PHP API wrapper for the Discord client (http://discordapp.com).

#User
```php
$discord->api('user')->show('user-id');  
$discord->api('user')->guilds('user-id');
```

#Message
```php
$discord->api('message')->get('channel-id', 50);
```

#Guild/Server
- create($name, $region)
```json
{
    "afk_timeout": 300,
    "joined_at": "2015-10-19T06:06:15.846810+00:00",
    "afk_channel_id": null,
    "id": "XXX",
    "icon": null,
    "name": "Kappaville",
    "roles": [
    {
        "managed": false,
        "name": "@everyone",
        "color": 0,
        "hoist": false,
        "position": -1,
        "id": "XXX",
        "permissions": 36953089
    }
    ],
    "region": "us-west",
    "embed_channel_id": null,
    "embed_enabled": false,
    "owner_id": "XXX"
}
```
- leave($guildId)
```json
{
    "afk_timeout": 300,
    "joined_at": "2015-10-19T06:06:15.846000+00:00",
    "afk_channel_id": null,
    "id": "XXX",
    "icon": null,
    "name": "Kappaville",
    "roles": [
    {
        "managed": false,
        "name": "@everyone",
        "color": 0,
        "hoist": false,
        "position": -1,
        "id": "XXX",
        "permissions": 36953089
    }
    ],
    "region": "us-west",
    "embed_channel_id": null,
    "embed_enabled": false,
    "owner_id": "XXX"
}
```


```php
$discord->api('guild')->show('guild-id');  
$discord->api('guild')->roles();  
$discord->api('guild')->members();  
$discord->api('guild')->bans();
```