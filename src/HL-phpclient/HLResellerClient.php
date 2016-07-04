<?php namespace Phpclient;

/**
 * Class HLResellerClient
 */
class HLResellerClient
{
    public $key,$secret;
    
    /**
     * HLResellerClient constructor.
     * @param $api_key
     * @param $api_secret
     */
    public function __construct($api_key,$api_secret)
    {
        $this->key = $api_key;
        $this->secret = $api_secret;
    }
}