### Gateway
[Back to main Readme](README.md)

#### Show Discord Gateway

```php
$discord = new Discord($email_address, $password);
$gateway = $discord->api('gateway')->show();
print_r($gateway);
```

Returns an array with your designated gateway.