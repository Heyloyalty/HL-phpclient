<?php namespace Phpclient;

class HLShops extends HLBase
{
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }

    /*
     * @codeCoverageIgnore
     */
    public function getShops($listId)
    {
        $this->endpoint = 'lists/' . $listId . '/shops';
        return $this->call('GET', $this->endpoint);
    }

    /*
     * @codeCoverageIgnore
     */
    public function createShop($listId, $data = [])
    {
        $this->endpoint = 'lists/' . $listId . '/shops';
        return $this->call('POST', $this->endpoint, $data);
    }
}
