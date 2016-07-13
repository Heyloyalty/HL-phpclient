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
 * Class HLAutologin
 * @package Phpclient
 */
class HLAutologin extends HLBase
{
    
    /**
     * HLAutologin constructor.
     */
    public function __construct(HLResellerClient $resellerClient)
    {
        $this->setResellerClient($resellerClient);
    }

    /**
     * @codeCoverageIgnore
     * Gets a login token
     * Usage: Https://app.heyloyalty.com/admin/accounts/{id}/autologin?token=kqFKsKDJN7aCSLgH.
     * @param $accountId
     * @return mixed
     */
    public function getLoginToken($accountId)
    {
        $this->endpoint = 'accounts/'.$accountId.'/loginToken';
        return $this->call('POST',$this->endpoint);
    }
}