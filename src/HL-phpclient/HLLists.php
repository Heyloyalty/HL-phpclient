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
     * @param $list_id
     * @return mixed
     */
    public function getList($list_id)
    {
        $this->endpoint = 'lists/'.$list_id;
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
     * @param $list_id
     * @param $params
     * @return mixed
     */
    public function update($list_id,$params)
    {
        $this->endpoint = 'lists/'.$list_id;
        return $this->call('PUT',$this->endpoint,$params);
    }

    /**
     * @param $list_id
     * @return mixed
     */
    public function delete($list_id)
    {
        $this->endpoint = 'lists/'.$list_id;
        return $this->call('DELETE',$this->endpoint);
    }
}