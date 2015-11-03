<?php
namespace Discord\Api\Channel;

use Discord\Api\AbstractApi;

class Permissions extends AbstractApi
{
    /**
     * @param string $channelId
     * @param string $typeId
     * @param string $type
     * @param int    $allow
     * @param int    $deny
     * @return array
     */
    public function create($channelId, $typeId, $type = 'role', $allow = 0, $deny = 0)
    {
        if (is_null($allow)) {
            $allow = 0;
        }
        if (is_null($deny)) {
            $deny = 0;
        }
        return $this->request('PUT', 'channels/' . $channelId . '/permissions/' . $typeId, [
            'json' => [
                'type' => $type,
                'id' => $typeId,
                'allow' => $allow,
                'deny' => $deny
            ]
        ]);
    }

    /**
     * Edit channel permissions.
     *
     * @param string $channelId
     * @param string $typeId
     * @param string $type
     * @param null   $allow
     * @param null   $deny
     * @return array
     */
    public function edit($channelId, $typeId, $type, $allow = null, $deny = null)
    {
        $current = $this->show($channelId, $typeId, $type);
        if (is_null($current)) {
            return $this->create($channelId, $typeId, $type, $allow, $deny);
        }
        if (is_null($allow)) {
            $allow = $current['allow'];
        }
        if (is_null($deny)) {
            $deny = $current['deny'];
        }
        return $this->request('PUT', 'channels/' . $channelId . '/permissions/' . $typeId, [
            'json' => [
                'type' => $current['type'],
                'id' => $current['id'],
                'allow' => $allow,
                'deny' => $deny
            ]
        ]);
    }

    /**
     * @param $channelId
     * @param $typeId
     * @param $type
     * @return mixed
     */
    public function show($channelId, $typeId, $type)
    {
        $current = $this->all($channelId);
        foreach ($current as $perm) {
            if ($perm['id'] == $typeId && $perm['type'] == $type) {
                return $perm;
            }
        }

        return null;
    }

    /**
     * Delete a permission type for the channel.
     *
     * @param string $channelId
     * @param string $typeId
     * @return null
     */
    public function delete($channelId, $typeId)
    {
        return $this->request('DELETE', 'channels/' . $channelId . '/permissions/' . $typeId);
    }

    /**
     * @param string $channelId
     * @return array
     */
    public function all($channelId)
    {
        $channel = $this->request('GET', 'channels/' . $channelId);
        return $channel['permission_overwrites'];
    }
}