<?php namespace Phpclient;

class HLAccounts
{
    /**
     * HLAccounts constructor.
     * @param HLResellerClient $resellerClient
     */
    public function __construct(HLResellerClient $resellerClient)
    {
        $this->setResellerClient($resellerClient);
    }
}