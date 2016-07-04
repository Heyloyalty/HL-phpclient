<?php namespace Phpclient;

/**
 * Class HLClient
 */
class HLClient
{
    public $key, $secret;
    
    /**
     * HLClient constructor.
     * @param $api_key
     * @param $api_secret
     */
    public function __construct($api_key,$api_secret)
    {
        $this->key = $api_key;
        $this->secret = $api_secret;
    }
}