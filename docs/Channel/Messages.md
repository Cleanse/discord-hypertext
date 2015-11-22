### Channel Messages API
[Back to the Channel API](../Channel.md)

#### Create Channel Message

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$content = 'Hello my friends @Cleanse and @Renew, check out the music I posted in <#channel_id>?';
//User IDs
$mentions = [
    '<user_id_for_Cleanse>',
    '<user_id_for_Renew>'
];
$discord->api('channel')->messages()->create($channelId, $content, $mentions);
```

Returns an array with the message details.

> Text to speech for messages are defaulted to false. Add a fourth param set to true for TTS.
> Channel names are auto linked with the following format `<#12345672424234>`

#### Edit Channel Message

```php
$discord = new Discord($email_address, $password);
$channelId = '<channel_id>';
$messageId = '<message_id>';
$content = 'Hello my friend @Cleanse, check out the music I posted in <#channel_id>?';
//User IDs
$mentions = [
    '<user_id_for_Cleanse>'
];
$discord->api('channel')->messages()->edit($channelId, $messageId, $content, $mentions);
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
