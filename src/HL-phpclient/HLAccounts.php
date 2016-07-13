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
 * Class HLAccounts
 * @package Phpclient
 */
class HLAccounts extends HLBase
{
    /**
     * HLAccounts constructor.
     * @param HLResellerClient $resellerClient
     */
    public function __construct(HLResellerClient $resellerClient)
    {
        $this->setResellerClient($resellerClient);
    }
    
    /**
     * @return mixed
     */
    public function getAccounts()
    {
        $this->endpoint = 'accounts';
        return $this->call('GET', $this->endpoint);
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function getAccount($id)
    {
        $this->endpoint = 'accounts/' . $id;
        return $this->call('GET', $this->endpoint);
    }
    
    /**
     * @param $id
     * @param $params
     * @return mixed
     */
    public function getAccountUsage($id, $params)
    {
        $this->endpoint = 'accounts/' . $id . '/usage';
        return $this->call('GET', $this->endpoint, $params);
    }
    
    /**
     * @param $params
     * @return mixed
     */
    public function create($params)
    {
        $this->endpoint = 'accounts/';
        return $this->call('POST', $this->endpoint, $params);
    }
    
    /**
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($id, $params)
    {
        $this->endpoint = 'accounts/' . $id;
        return $this->call('PUT', $this->endpoint, $params);
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $this->endpoint = 'accounts/' . $id;
        return $this->call('DELETE', $this->endpoint);
    }
}