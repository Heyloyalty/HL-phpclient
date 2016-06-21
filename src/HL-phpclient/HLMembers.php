<?php

/**
 * Class HLMembers
 */
class HLMembers extends HLBase
{
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }

    public function getMembers($list_id)
    {
        $this->endpoint = 'lists'.$list_id.'members';
        return $this->call('GET',$this->endpoint);
    }

    public function getMemberByEmail($list_id,$email)
    {
        $filter = array(
            'filter' => [
                'email' => [
                    'eq' => [$email]
                ]
            ]
        );
        $this->endpoint = 'lists'.$list_id.'members';
        return $this->call('GET',$this->endpoint,$filter);
    }

    public function getMembersByFilter($list_id, array $filter)
    {
        $this->endpoint = 'lists'.$list_id.'members';
        return $this->call('GET',$this->endpoint,$filter);
    }

    public function getMember($list_id,$member_id)
    {
        $this->endpoint = 'lists'.$list_id.'members'.$member_id;
        return $this->call('GET',$this->endpoint);
    }

    public function create($list_id, array $fields)
    {
        $this->endpoint = 'lists'.$list_id.'members';
        return $this->call('POST',$this->endpoint,$fields);
    }

    public function update($list_id,$member_id,array $fields)
    {
        $this->endpoint = 'lists'.$list_id.'members'.$member_id;
        return $this->call('PUT',$this->endpoint,$fields);
    }

    public function delete($list_id,$member_id)
    {
        $this->endpoint = 'lists'.$list_id.'members'.$member_id;
        return $this->call('DELETE',$this->endpoint);
    }

    public function import($list_id, array $options,$path_to_file)
    {

    }
}