<?php
namespace Discord\Api\Channel;

use Discord\Api\AbstractApi;

class Permissions extends AbstractApi
{
    public function all($channelId)
    {
        $channel = $this->request('GET', 'channels/' . $channelId);
        return $channel['permission_overwrites'];
    }
}