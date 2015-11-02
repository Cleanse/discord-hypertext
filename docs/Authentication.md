### Authentication API
[Back to main Readme](README.md)

#### Login to Discord

```php
$discord = new Discord($email_address, $password);
print_r($discord);
```

Returns an array with your auth token.

> Note the client automatically does this for you. This is merely for documentation.

#### Logout of Discord

```php
$discord = new Discord($email_address, $password);
$discord->api('authentication')->logout();
```

Logs you out from Discord.