## discord-php
An unofficial PHP API wrapper for the Discord client (http://discordapp.com).  

###Users

#### Show User Information

```php
$discord->api('user')->show('user-id');
```

#### Show User's Guilds/Servers

```php
$discord->api('user')->guilds('user-id');
```

###Guilds/Servers

#### Create Guild (Server)
```php
$discord->api('guild')->create('MyServerName', 'us-west');
```

#### Leave Guild (Server)

```php
$discord->api('guild')->leave('<guild_id>')
```

#### Edit Guild (Server)

```php
$discord->api('guild')->edit($guildId <id>, $array = [])
```
> Options: name, icon, region, afk_channel_id

#### Enable Guild Widget
```php
$discord->api('guild')->widget('<guild_id>', true, '<channel_id>');
```

#### Show Guild
```php
$discord->api('guild')->show($guildId <id>)
```

###Channels

#### Create New Channel

> Required: guild_id <str>, name <str>

> Optional: type <str> (text or voice)

```php
$discord->api('channel')->create($guildId, $name, $type = 'text');
```

#### Delete Channel

> Required: channel_id <str>

```php
$discord->api('channel')->delete($channelId);
```

#### Edit Channel

> Required: channel_id <str>

> Optional: array <array> ['name' => 'ChannelName', 'position' => 0, 'topic' => 'YourTopicName']

```php
$discord->api('channel')->edit($channelId, $array);
```

#### Edit Channel Topic

> Required: channel_id <str>, topic <str>

```php
$discord->api('channel')->topic($channelId, $topic);
```

#### Show Guild Channels

> Required: guild_id <str>

```php
$discord->api('channel')->show($guildId);
```

###Messages

#### Create New Message

> channel_id, message content, array of mentioned user id(s), send as text to speech boolean

```php
$discord->api('message')->create('<channel_id>', '<message_string>', ['<user_mentioned_id>'], <boolean>);
```

#### Delete Message

> channel_id, message_id

```php
$discord->api('message')->delete('<channel_id>', '<message_id');
```

#### Edit Message

> Required: id = channel_id, id = message_id, string = message content

> Optional: array = mentioned user id(s)

```php
$discord->api('message')->edit('<channel_id>', '<message_id>', , '<message_string>', ['<user_mentioned_id>', '<user_mentioned_id>']);
```

#### Show Channel Messages

> Required: id = channel_id

> Optional: limit = 50 max, before = <message id>

```php
$discord->api('message')->get('<channel_id>', <limit>, '<before>');
```