## discord-php
An unofficial PHP API wrapper for the Discord client (http://discordapp.com).  

####User

```php
$discord->api('user')->show('user-id');  
$discord->api('user')->guilds('user-id');
```

####Message

```php
$discord->api('message')->get('channel-id', 50);
```

###Guild/Server

#### Create Guild (Server)
```php
$discord->api('guild')->create('MyServerName', 'us-west');
```

> Regions:
- us-west
- singapore
- london
- us-east
- sydney
- amsterdam
>

> Response:

```json
{
    "afk_timeout": 300,
    "joined_at": "2015-10-19T06:06:15.846810+00:00",
    "afk_channel_id": null,
    "id": "<guild_id>",
    "icon": null,
    "name": "MyServerName",
    "roles": [
    {
        "managed": false,
        "name": "@everyone",
        "color": 0,
        "hoist": false,
        "position": -1,
        "id": "<role_id>",
        "permissions": 36953089
    }
    ],
    "region": "us-west",
    "embed_channel_id": null,
    "embed_enabled": false,
    "owner_id": "<your_id>"
}
```


#### Leave Guild (Server)

```php
$discord->api('guild')->leave('<guild_id>')
```

> Response: 

```json
{
    "afk_timeout": 300,
    "joined_at": "2015-10-19T06:06:15.846000+00:00",
    "afk_channel_id": null,
    "id": "<guild_id>",
    "icon": null,
    "name": "MyServerName",
    "roles": [
    {
        "managed": false,
        "name": "@everyone",
        "color": 0,
        "hoist": false,
        "position": -1,
        "id": "<role_id>",
        "permissions": 36953089
    }
    ],
    "region": "us-west",
    "embed_channel_id": null,
    "embed_enabled": false,
    "owner_id": "<your_id>"
}
```

#### Edit Guild (Server)

```php
$discord->api('guild')->edit($guildId <id>, $array = [])
```
> Options:
1. name
2. icon
3. region
>4. afk_channel_id

#### Enable Guild Widget
```php
$discord->api('guild')->widget('<guild_id>', true, '<channel_id>');
```

#### Show Guild
```php
$discord->api('guild')->show($guildId <id>)
```
