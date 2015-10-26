<?php
namespace Discord\Helpers;

use Discord\Discord;

class Mentions
{
    private $discord;

    public function __construct($discord)
    {
        $this->discord = $discord;
    }

    public function addMentions($message)
    {
        $filterMembers = $this->memberMentions($message);
        return $this->channelMentions($filterMembers);
    }

    /*
     * Thanks @Vinlock
     */
    private function memberMentions($message)
    {
        $filteredMessage = $message['content'];
        foreach ($message['mentions'] as $mention) {
            $filteredMessage = str_replace('<@'.$mention['id'].'>', '@'.$mention['username'], $filteredMessage);
        }
        return $filteredMessage;
    }

    private function channelMentions($message)
    {
        $closure = $this->discord;
        return preg_replace_callback('/<#([\w_\.]+)>/', function($m) use ($closure) {
            if ($closure->api('channel')->get($m[1])['name']) {
                return '#'.$closure->api('channel')->get($m[1])['name'];
            }
            return '#'.$m[1];
        }, $message);
    }
}