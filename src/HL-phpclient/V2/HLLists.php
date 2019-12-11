<?php namespace Phpclient\V2;
use Phpclient\HLBase;
use Phpclient\HLClient;
/**
 * Class HLLists
 * @package Phpclient
 */
class HLLists extends HLBase
{
    /**
     * HLLists constructor.
     * @param HLClient $client
     */
    public function __construct(HLClient $client)
    {
        $this->setClient($client, 2);
    }

    /***
     * @param $listId
     * @param $params
     * @return mixed
     */
    public function patch($listId, $params)
    {
        $this->endpoint = 'lists/' . $listId;
        return $this->call('PATCH', $this->endpoint, $params);
    }

}
