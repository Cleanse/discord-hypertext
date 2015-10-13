<?php
namespace Discord;

class DiscordChannel
{
    public $id;
    public $guild_id;
    public $name;
    public $permission_overwrites;
    public $topic;
    public $type;
    public $position;
    public $last_message_id;
    public $is_private;
    //public $messages;

    public function __construct($channel)
    {
        $this->id = $channel->id;
        $this->guild_id = $channel->guild_id;
        $this->name = $channel->name;
        $this->permission_overwrites = $channel->permission_overwrites;
        $this->topic = $channel->topic;
        $this->type = $channel->type;
        $this->position = $channel->position;
        $this->last_message_id = $channel->last_message_id;
        $this->is_private = $channel->is_private;
        if($channel->type == 'text') {
            //$this->messages = $this->getMessages($channel->id);
        }
    }

    private function getMessages($channel, $limit = 50, $before = null)
    {
        $params = '?limit='.$limit;
        if(!is_null($before)) {
            $params .= '&before='.$before;
        }
        $messages = [];
        try {
            $guzzle = new DiscordHelper;
            $request = $guzzle->request('get', 'channels/'.$channel.'/messages'.$params, [
                'headers' => [
                    'authorization' => $this->client->token
                ]
            ]);

            $decoded = json_decode($request->getBody()->getContents());
            foreach($decoded as $message) {
                $messages[] = new DiscordChannel($message);
            }
        } catch (RequestException $e) {
            $messages = 'Not authorized.';
        }
        return $messages;
    }
}