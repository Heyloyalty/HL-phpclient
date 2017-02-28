<?php namespace  Phpclient;
    /*
         * This file is part of the hl-phpclient package.
         *
         * (c) René Skou <skou.rene@gmail.com>
         *
         * For the full copyright and license information, please view the LICENSE
         * file that was distributed with this source code.
         */
/**
 * Class HLBase
 */
class HLBase extends HLCurlHandler
{
    protected $signature, $date,$path;
    protected $endpoint;
    const HOST = 'https://api.heyloyalty.com/';

    /**
     * @param $type
     * @param $endpoint
     * @param array $postFields
     * @return mixed
     */
    protected function call($type,$endpoint,$postFields = array(),$file = null)
    {
        $url = self::HOST.$this->path.$endpoint;
        return $this->makeCall($type,$url,$postFields,$file,$this->signature,$this->date);
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
