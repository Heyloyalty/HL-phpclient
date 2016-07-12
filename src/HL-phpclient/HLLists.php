<?php namespace Phpclient;

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
        $this->setClient($client);
    }
    
    /**
     * @return mixed
     */
    public function getLists()
    {
        $this->endpoint = 'lists';
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @param $listId
     * @return mixed
     */
    public function getList($listId)
    {
        $this->endpoint = 'lists/'.$listId;
        return $this->call('GET',$this->endpoint);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params)
    {
        $this->endpoint = 'lists';
        return $this->call('POST',$this->endpoint,$params);
    }

    /**
     * @param $listId
     * @param $params
     * @return mixed
     */
    public function update($listId,$params)
    {
        $this->endpoint = 'lists/'.$listId;
        return $this->call('PUT',$this->endpoint,$params);
    }

    /**
     * @param $listId
     * @return mixed
     */
    public function delete($listId)
    {
        $this->endpoint = 'lists/'.$listId;
        return $this->call('DELETE',$this->endpoint);
    }
}