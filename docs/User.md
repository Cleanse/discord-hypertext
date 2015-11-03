### User API
[Back to main Readme](README.md)

#### Edit Your Profile

```php
$discord = new Discord($email_address, $password);
$username = 'NewUsername';
$avatar = '<url_to_new_avatar_image>';
$editUser = $discord->api('user')
    ->edit($email_address, $password, $username, null, $avatar);
```

Returns updated profile array.

> `username`, `new_password`, and/or `avatar` can be null.

#### Show Your Profile

```php
$discord = new Discord($email_address, $password);
$editUser = $discord->api('user')->me();
```

Returns your profile data as an array.

#### Show User

```php
$discord = new Discord($email_address, $password);
$userId = '<user_id>';
$editUser = $discord->api('user')->show($userId);
```

Returns an array with user's public data.

#### Show User's Guilds

```php
$discord = new Discord($email_address, $password);
$userId = '<user_id>';
$editUser = $discord->api('user')->guilds($userId);
```

Returns an array with user's guild data.

#### Show User Avatar

```php
$discord = new Discord($email_address, $password);
$userId = '<user_id>';
$editUser = $discord->api('user')->avatar($userId);
```

Returns a string with the user's avatar.

