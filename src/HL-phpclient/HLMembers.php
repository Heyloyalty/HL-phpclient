<?php namespace Phpclient;

/**
 * Class HLMembers
 */
class HLMembers extends HLBase
{
    /**
     * HLMembers constructor.
     * @param HLClient $client
     */
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }
    
    /**
     * @param $list_id
     * @return mixed
     */
    public function getMembers($list_id)
    {
        $this->endpoint = 'lists/'.$list_id.'/members';
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @param $list_id
     * @param $email
     * @return mixed
     */
    public function getMemberByEmail($list_id,$email)
    {
        $filter = array(
            'filter' => [
                'email' => [
                    'eq' => [$email]
                ]
            ]
        );
        $this->endpoint = 'lists/'.$list_id.'/members';
        return $this->call('GET',$this->endpoint,$filter);
    }
    
    /**
     * @param $list_id
     * @param array $filter
     * @return mixed
     */
    public function getMembersByFilter($list_id, array $filter)
    {
        $this->endpoint = 'lists/'.$list_id.'/members';
        return $this->call('GET',$this->endpoint,$filter);
    }
    
    /**
     * @param $list_id
     * @param $member_id
     * @return mixed
     */
    public function getMember($list_id,$member_id)
    {
        $this->endpoint = 'lists/'.$list_id.'/members/'.$member_id;
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @param $list_id
     * @param array $fields
     * @return mixed
     */
    public function create($list_id, array $fields)
    {
        $this->endpoint = 'lists/'.$list_id.'/members';
        return $this->call('POST',$this->endpoint,$fields);
    }
    
    /**
     * @param $list_id
     * @param $member_id
     * @param array $fields
     * @return mixed
     */
    public function update($list_id,$member_id,array $fields)
    {
        $this->endpoint = 'lists/'.$list_id.'/members/'.$member_id;
        return $this->call('PUT',$this->endpoint,$fields);
    }
    
    /**
     * @param $list_id
     * @param $member_id
     * @return mixed
     */
    public function delete($list_id,$member_id)
    {
        $this->endpoint = '/lists'.$list_id.'/members/'.$member_id;
        return $this->call('DELETE',$this->endpoint);
    }
}