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
 * Class HLAccountUsers
 * @package Phpclient
 */
class HLAccountUsers extends HLBase
{
    
    /**
     * HLAccountUsers constructor.
     */
    public function __construct(HLResellerClient $resellerClient)
    {
        $this->setResellerClient($resellerClient);
    }
    
    /**
     * @codeCoverageIgnore
     * @param $accountId
     * @return mixed
     */
    public function getUsers($accountId)
    {
        $this->endpoint = 'accounts/'.$accountId.'/users';
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @codeCoverageIgnore
     * @param $id
     * @param $accountId
     * @return mixed
     */
    public function getUser($id,$accountId)
    {
        $this->endpoint = 'accounts/'.$accountId.'/users/'.$id;
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @codeCoverageIgnore
     * @param $accountId
     * @param $params
     * @return mixed
     */
    public function create($accountId,$params)
    {
        $this->endpoint = 'accounts/'.$accountId.'/users';
        return $this->call('POST',$this->endpoint,$params);
    }
    
    /**
     * @codeCoverageIgnore
     * @param $accountId
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($accountId,$id,$params)
    {
        $this->endpoint = 'accounts/'.$accountId.'/users/'.$id;
        return $this->call('POST',$this->endpoint,$params);
    }
    
    /**
     * @codeCoverageIgnore
     * @param $accountId
     * @param $id
     * @return mixed
     */
    public function delete($accountId,$id)
    {
        $this->endpoint = 'accounts/'.$accountId.'/users/'.$id;
        return $this->call('DELETE',$this->endpoint);
    }
}
