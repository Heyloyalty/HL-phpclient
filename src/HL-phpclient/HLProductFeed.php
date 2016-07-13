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
 * Class HLProductFeed
 * @package Phpclient
 */
class HLProductFeed extends HLBase
{
    /**
     * HLProductFeed constructor.
     * @param HLClient $client
     */
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }

    /**
     *
     * @return mixed
     */
    public function getProductFeeds()
    {
        $this->endpoint = 'integrations/productfeed';
        return $this->call('GET',$this->endpoint);
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function getProductFeedMapping($id)
    {
        $this->endpoint = 'integrations/productfeed-mapping/'.$id;
        return $this->call('GET',$this->endpoint);
    }

    /**
     *
     * @param $params
     * @return mixed
     */
    public function create($params)
    {
        $this->endpoint = 'integrations/productfeed';
        return $this->call('POST',$this->endpoint,$params);
    }

    /**
     *
     * @param $params
     * @return mixed
     */
    public function createMapping($params)
    {
        $this->endpoint = 'integrations/productfeed-mapping';
        return $this->call('POST',$this->endpoint,$params);
    }

    /**
     *
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($id,$params)
    {
        $this->endpoint = 'integrations/productfeed/'.$id;
        return $this->call('PUT',$this->endpoint,$params);
    }

    /**
     *
     * @param $id
     * @param $params
     * @return mixed
     */
    public function updateMapping($id,$params)
    {
        $this->endpoint = 'integrations/productfeed-mapping/'.$id;
        return $this->call('GET',$this->endpoint,$params);
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $this->endpoint = 'integrations/productfeed/'.$id;
        return $this->call('DELETE',$this->endpoint);
    }
}