<?php namespace Phpclient;

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
     * @param $account_id
     * @return mixed
     */
    public function getUsers($account_id)
    {
        $this->endpoint = 'accounts/'.$account_id.'users';
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @param $id
     * @param $account_id
     * @return mixed
     */
    public function getUser($id,$account_id)
    {
        $this->endpoint = 'accounts/'.$account_id.'users'.$id;
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @param $account_id
     * @param $params
     * @return mixed
     */
    public function create($account_id,$params)
    {
        $this->endpoint = 'accounts/'.$account_id.'users';
        return $this->call('POST',$this->endpoint,$params);
    }
    
    /**
     * @param $account_id
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($account_id,$id,$params)
    {
        $this->endpoint = 'accounts/'.$account_id.'users'.$id;
        return $this->call('POST',$this->endpoint,$params);
    }
    
    /**
     * @param $account_id
     * @param $id
     * @return mixed
     */
    public function delete($account_id,$id)
    {
        $this->endpoint = 'accounts/'.$account_id.'users'.$id;
        return $this->call('DELETE',$this->endpoint);
    }
}