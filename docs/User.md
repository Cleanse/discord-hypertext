### User API
[Back to main Readme](README.md)

#### Show Your Profile

```php
$discord = new Discord($email_address, $password);
$editUser = $discord->api('user')->me();
```

#### Show User

```php
$discord = new Discord($email_address, $password);
$userId = '<user_id>';
$editUser = $discord->api('user')->show($userId);
```

Returns an array with user's public data.

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

Returns your profile data as an array.

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

#### Create Private Channel

```php
$discord = new Discord($email_address, $password);
$userId = '<user_id>';
$editUser = $discord->api('user')->createChannel($userId);
```

Returns an array of data in which you can get the channel id for a private message.