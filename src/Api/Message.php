<?php
namespace Discord\Api;

class Message extends AbstractApi
{
    public function get($channel, $limit = 50, $before = null)
    {
        $params = '?limit='.$limit;
        if(!is_null($before)) {
            $params .= '&before='.$before;
        }
        return $this->request('get', 'channels/'.$channel.'/messages'.$params, [
            'headers' => [
                'authorization' => $this->token
            ]
        ]);
    }
}