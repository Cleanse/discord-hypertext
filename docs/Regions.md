### Regions API
[Back to main Readme](README.md)

#### Show Discord Regions

```php
$discord = new Discord($email_address, $password);
$regions = $discord->api('regions')->show();
print_r($regions);
```

Returns an array with regions voice servers are hosted.