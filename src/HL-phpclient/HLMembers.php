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
     * @param $listId
     * @return mixed
     */
    public function getMembers($listId)
    {
        $this->endpoint = 'lists/'.$listId.'/members';
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @param $listId
     * @param $email
     * @return mixed
     */
    public function getMemberByEmail($listId,$email)
    {
        $filter = array(
            'filter' => [
                'email' => [
                    'eq' => [$email]
                ]
            ]
        );
        $this->endpoint = 'lists/'.$listId.'/members';
        return $this->call('GET',$this->endpoint,$filter);
    }
    
    /**
     * @param $listId
     * @param array $filter
     * @return mixed
     */
    public function getMembersByFilter($listId, array $filter)
    {
        $this->endpoint = 'lists/'.$listId.'/members';
        return $this->call('GET',$this->endpoint,$filter);
    }
    
    /**
     * @param $listId
     * @param $memberId
     * @return mixed
     */
    public function getMember($listId,$memberId)
    {
        $this->endpoint = 'lists/'.$listId.'/members/'.$memberId;
        return $this->call('GET',$this->endpoint);
    }
    
    /**
     * @param $listId
     * @param array $fields
     * @return mixed
     */
    public function create($listId, array $fields)
    {
        $this->endpoint = 'lists/'.$listId.'/members';
        return $this->call('POST',$this->endpoint,$fields);
    }
    
    /**
     * @param $listId
     * @param $memberId
     * @param array $fields
     * @return mixed
     */
    public function update($listId,$memberId,array $fields)
    {
        $this->endpoint = 'lists/'.$listId.'/members/'.$memberId;
        return $this->call('PUT',$this->endpoint,$fields);
    }
    
    /**
     * @param $listId
     * @param $memberId
     * @return mixed
     */
    public function delete($listId,$memberId)
    {
        $this->endpoint = '/lists'.$listId.'/members/'.$memberId;
        return $this->call('DELETE',$this->endpoint);
    }
}