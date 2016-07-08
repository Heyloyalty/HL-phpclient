<?php namespace  Phpclient;
/**
 * Class HLBase
 */
class HLBase extends HLCurlHandler
{
    private $signature, $date,$path;
    protected $endpoint;
    const HOST = 'https://api.heyloyalty.com/';

    /**
     * @param $type
     * @param $endpoint
     * @param array $post_fields
     * @return mixed
     */
    protected function call($type,$endpoint,$post_fields = array(),$file = null)
    {
        $url = self::HOST.$this->path.$endpoint;
        return $this->makeCall($type,$url,$post_fields,$file,$this->signature,$this->date);
    }

    /**
     * @param HLClient $client
     */
    protected function setClient(HLClient $client)
    {
        $this->path = 'loyalty/v1/';
        $this->setSignature($client->key,$client->secret);
    }

    /**
     * @param HLResellerClient $resellerClient
     */
    protected function setResellerClient(HLResellerClient $resellerClient)
    {
        $this->path = 'reseller/';
        $this->setSignature($resellerClient->key,$resellerClient->secret);
    }

    /**
     * @param $key
     * @param $secret
     */
    private function setSignature($key,$secret)
    {
        $this->date = gmdate("D, d M Y H:i:s") . ' GMT';
        $password = base64_encode(hash_hmac('sha256', $this->date, $secret));
        $this->signature = base64_encode($key.':'.$password);
    }
}