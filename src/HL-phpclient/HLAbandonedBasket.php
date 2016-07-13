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
     * @param HLResellerClient $resellerClient
     */
    public function __construct(HLResellerClient $resellerClient)
    {
        $this->setResellerClient($resellerClient);
    }

    public function getAbandonedBasket($listId)
    {
        $this->endpoint  = 'lists/'.$listId.'/options/bi';
        $this->call('GET',$this->endpoint);
    }
}