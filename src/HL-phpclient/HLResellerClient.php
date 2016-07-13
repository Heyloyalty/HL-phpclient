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
 * Class HLResellerClient
 */
class HLResellerClient
{
    public $key,$secret;
    
    /**
     * HLResellerClient constructor.
     * @param $apiKey
     * @param $apiSecret
     */
    public function __construct($apiKey,$apiSecret)
    {
        $this->key = $apiKey;
        $this->secret = $apiSecret;
    }
}