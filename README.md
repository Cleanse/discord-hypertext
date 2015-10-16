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

#Guild
```php
$discord->api('guild')->show('guild-id');  
$discord->api('guild')->roles();  
$discord->api('guild')->members();  
$discord->api('guild')->bans();
```
