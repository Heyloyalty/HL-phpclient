<?php namespace Phpclient;
    /*
         * This file is part of the hl-phpclient package.
         *
         * (c) René Skou <skou.rene@gmail.com>
         *
         * For the full copyright and license information, please view the LICENSE
         * file that was distributed with this source code.
         */
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

    /**
     * @return mixed
     */
    public function getCountries()
    {
        $this->endpoint = 'lists/countries';
        return $this->call('GET',$this->endpoint);
    }

}
