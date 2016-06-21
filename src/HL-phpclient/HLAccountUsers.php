<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/06/16
 * Time: 19:59
 */
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