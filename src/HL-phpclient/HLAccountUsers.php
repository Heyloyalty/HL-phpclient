<?php namespace Phpclient;

class HLAccountUsers extends HLBase
{
    
    /**
     * HLAccountUsers constructor.
     */
    public function __construct(HLResellerClient $resellerClient)
    {
        $this->setResellerClient($resellerClient);
    }
}