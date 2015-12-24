### Channel Messages API
[Back to the Channel API](../Channel.md)

#### Create Channel Message

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$content = 'Hello my friends <@user_id> and <@user_id>, check out the music I posted in <#channel_id>?';
$discord->api('channel')->messages()->create($channelId, $content);
```

Returns an array with the message details.

> Text to speech for messages are defaulted to false. Add a third param set to true for TTS.  
> User mentions are auto linked with the following format `<@userid>`  
> Channel names are auto linked with the following format `<#12345672424234>`

#### Edit Channel Message

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$messageId = '<message_id>';
$content = 'Hello my friend <@userid>, check out the music I posted in <#channel_id>?';
$discord->api('channel')->messages()->edit($channelId, $messageId, $content);
```

> Can only edit your own messages.

#### Delete Channel Message

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$messageId = '<message_id>';
$discord->api('channel')->messages()->delete($channelId, $messageId);
```

#### Show Channel Message(s)

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$limit = 1;
$before = '<message_id>';
$after = '<message_id>';
$discord->api('channel')->messages()->show($channelId, $limit, $before, $after);
```

Returns an array of message(s).

> Default limit is 50. Before and after parameters is optional.  
> The limit is 100 messages per request.
