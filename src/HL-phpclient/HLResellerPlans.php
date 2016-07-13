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
 * Class HLResellerPlans
 * @package Phpclient
 */
class HLResellerPlans extends HLBase
{
    
    /**
     * HLResellerPlans constructor.
     * @param HLResellerClient $resellerClient
     */
    public function __construct(HLResellerClient $resellerClient)
    {
        $this->setResellerClient($resellerClient);
    }

    /**
     * @return mixed
     */
    public function getResellerPlans()
    {
        $this->endpoint = 'resellerPlans';
        return $this->call('GET',$this->endpoint);
    }

    /**
     * @param $accountId
     * @param $params
     * @return mixed
     */
    public function setPlan($accountId,$params)
    {
        $this->endpoint = 'accounts/'.$accountId.'/plan/setplan';
        return $this->call('PUT',$this->endpoint,$params);
    }
}