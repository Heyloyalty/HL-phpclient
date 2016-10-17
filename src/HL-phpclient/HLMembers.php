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
            'filter' => array (
                'email' => array ( 
                    'eq' => array( $email )
                )
            )
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
        $this->endpoint = 'lists/'.$listId.'/members/'.$memberId;
        return $this->call('DELETE',$this->endpoint);
    }
    
    /**
     * Bulk import or update members on a list.
     * @param $listId
     * @param $params
     * @param $file
     * @return mixed
     */
    public function import($listId,$params,$file)
    {
        $this->endpoint = 'lists/'.$listId.'/import';
        return $this->call('POST',$this->endpoint,$params,$file);
    }
}
