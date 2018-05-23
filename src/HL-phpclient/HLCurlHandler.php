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
 * Class HLCurlHandler
 * @package Phpclient
 */
class HLCurlHandler
{
    /**
     * @param $requestType
     * @param $url
     * @param $postFields
     * @param $file
     * @param $signature
     * @param $date
     * @return mixed
     */
    protected function makeCall($requestType, $url, $postFields, $file, $signature, $date)
    {
        $headers = array(
            "authorization: Basic " . $signature . "",
            "x-request-timestamp: " . $date . "",
        );
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        
        
        $postFields = $this->buildOneDimensionArray($postFields);
        if (!is_null($file)) {
            $postFields['file'] = curl_file_create($file, 'text/csv', 'file');
            array_push($headers, 'Content-type: multipart/form-data');
        }
        
        switch ($requestType) {
            case 'DELETE':
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'DELETE');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postFields));
                break;
            case 'GET':
                curl_setopt($curl, CURLOPT_URL, $url.'?'.http_build_query($postFields));
                curl_setopt($curl, CURLOPT_HTTPGET, true);
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postFields));
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
                break;
        }
        
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $response['response'] = curl_exec($curl);
        if (curl_errno($curl)) {
            $response['error'] = curl_error($curl);
        }
        curl_close($curl);
        
        return $response;
    }
    
    /**
     * @param $arrays
     * @param array $new
     * @param null $prefix
     * @return array
     */
    protected function buildOneDimensionArray($arrays, &$new = array(), $prefix = null)
    {
        if (is_object($arrays)) {
            $arrays = get_object_vars($arrays);
        }
        
        foreach ($arrays AS $key => $value) {
            $k = isset($prefix) ? $prefix . '[' . $key . ']' : $key;
            if (is_array($value) OR is_object($value)) {
                $this->buildOneDimensionArray($value, $new, $k);
            } else {
                $new[$k] = $value;
            }
        }
        return $new;
    }
}
