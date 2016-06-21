<?php

/**
 * Class HLBase
 */
class HLBase
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
    protected function call($type,$endpoint,$post_fields = array())
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => self::HOST.$this->path.$endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_POSTFIELDS => http_build_query($post_fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: Basic " .$this->signature. "",
                "x-request-timestamp: " .$this->date. ""
            ),
        ));
        $response = curl_exec($curl);
        $response['errors'] = curl_error($curl);
        curl_close($curl);
        return $response;
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