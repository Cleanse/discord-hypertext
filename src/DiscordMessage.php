<?php
namespace Discord;

class DiscordMessage
{
/*"attachments": [],
"tts": false,
"embeds": [],
"timestamp": "2015-10-10T14:27:30.817000+00:00",
"mention_everyone": false,
"id": "102411695049154560",
"edited_timestamp": null,
"author": {
"username": "Turncoat",
"discriminator": "2901",
"id": "85975828646596608",
"avatar": "f37b50e9d3e643b52238682e974ec204"
},
"content": "LOLERSKATES",
"channel_id": "81616490922520576",
"mentions": []*/
    public $id;
    public $attachments;
    public $tts;
    public $embeds;
    public $timestamp;
    public $mention_everyone;
    public $edited_timestamp;
    public $author;
    public $content;
    public $channel_id;
    public $mentions;

    public function __construct($message)
    {
        $this->id = $message->id;
        $this->attachments = $message->attachments;
        $this->tts = $message->tts;
        $this->embeds = $message->embeds;
        $this->timestamp = $message->timestamp;
        $this->mention_everyone = $message->mention_everyone;
        $this->edited_timestamp = $message->edited_timestamp;
        $this->author = $message->author;
        $this->content = $message->content;
        $this->channel_id = $message->channel_id;
        $this->mentions = $message->mentions;
    }
}