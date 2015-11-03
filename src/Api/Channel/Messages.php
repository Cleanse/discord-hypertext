<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\Api\Channel;

use Discord\Api\AbstractApi;

class Messages extends AbstractApi
{
    /**
     * @param string     $channelId
     * @param string     $content
     * @param array      $mentions
     * @param bool|false $tts
     * @return array
     */
    public function create($channelId, $content, $mentions = [], $tts = false)
    {
        return $this->request('POST', 'channels/' . $channelId . '/messages', [
            'json' => [
                'content' => $content,
                'mentions' => $mentions,
                'tts' => $tts
            ]
        ]);
    }

    /**
     * @param string $channelId
     * @param string $messageId
     * @param string $content
     * @param array  $mentions
     * @return array
     */
    public function edit($channelId, $messageId, $content, $mentions = [])
    {
        return $this->request('PATCH', 'channels/' . $channelId . '/messages/' . $messageId, [
            'json' => [
                'content' => $content,
                'mentions' => $mentions
            ]
        ]);
    }

    /**
     * @param string $channelId
     * @param string $messageId
     * @return none
     */
    public function delete($channelId, $messageId)
    {
        return $this->request('DELETE', 'channels/' . $channelId . '/messages/' . $messageId);
    }

    /**
     * @param string        $channel
     * @param int           $limit
     * @param string|null   $before
     * @return array
     */
    public function show($channel, $limit = 50, $before = null)
    {
        $params = '?limit=' . $limit;
        if (!is_null($before)) {
            $params .= '&before=' . $before;
        }
        return $this->request('get', 'channels/' . $channel . '/messages' . $params);
    }
}