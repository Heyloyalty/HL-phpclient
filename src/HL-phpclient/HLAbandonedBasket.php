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
 * Class HLAbandonedBasket
 * @package Phpclient
 */
class HLAbandonedBasket extends HLBase
{
    
    /**
     * HLAbandonedBasket constructor.
     * @param HLClient $client
     */
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }
    
    public function getAbandonedBasket($listId)
    {
        $this->endpoint  = 'lists/'.$listId.'/options/bi';
        return $this->call('GET',$this->endpoint);
    }
    

    Public function update($listId,$params)
    {
        $this->endpoint = 'lists/'.$listId.'/options/bi';
        return $this->call('PUT',$this->endpoint,$params);
    }
}