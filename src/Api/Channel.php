<?php
namespace Discord\Api;

class Channel extends AbstractApi
{
    /*
     * {"type":"text","name":"YourChannelName"}
     */
    public function create($guildId, $name, $type = 'text')
    {
        return $this->request('POST', 'guilds/'.$guildId.'/channels', [
            'headers' => ['authorization' => $this->token],
            'json' => ['type' => $type, 'name' => $name]
        ]);
    }

    public function delete($channelId)
    {
        return $this->request('DELETE', 'channels/'.$channelId, [
            'headers' => ['authorization' => $this->token]
        ]);
    }

    /*
     * {"name":"ChannelName","position":0,"topic":"YourTopicName"}
     */
    public function edit($channelId, $array)
    {
        return $this->request('PATCH', 'channels/'.$channelId, [
            'headers' => ['authorization' => $this->token],
            'json' => $array
        ]);
    }

    /*
     * Small wrapper to change topic only.
     */
    public function topic($channelId, $topic)
    {
        return $this->edit($channelId, ['topic' => $topic]);
    }

    public function show($guildId)
    {
        return $this->request('GET', 'guilds/'.$guildId.'/channels', [
            'headers' => ['authorization' => $this->token]
        ]);
    }

    /*public function permissions()
    {
        //To do.
    }*/
}