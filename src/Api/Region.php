<?php
namespace Discord\Api;

class Region extends AbstractApi
{
    public function show()
    {
        return $this->request('GET', 'voice/regions', [
            'headers' => ['authorization' => $this->token]
        ]);
    }
}