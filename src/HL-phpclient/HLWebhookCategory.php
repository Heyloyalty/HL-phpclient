<?php namespace Phpclient;

use DateTime;

class HLWebhookCategory extends HLBase
{
    protected $messageBuilder = [
        'TriggerDisplayName' => 'webhook-category',
        'Context' => [
            'Category' => '',
            'ListId' => 0,
            'UserId' => ''
        ],
        'Content' => []
    ];

    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }

    /*
     * @codeCoverageIgnore
     */
    public function sendRaw(array $eventData)
    {
        return $this->callHL(array('Data' => json_encode($eventData)));
    }

    protected function callHL($data)
    {
        $url = $this->getUrl();
        $headers = $this->getHeaders();
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
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

    protected function getUrl()
    {
        return self::HOST . 'loyalty/v1/webhooktrigger';
    }

    protected function getHeaders()
    {
        return array(
            "authorization: Basic "  . $this->signature . "",
            "x-request-timestamp: " . $this->date  . "",
            "Content-type: multipart/form-data"
        );
    }

    /*
     * @codeCoverageIgnore
     */

    public function setListId(int $listId)
    {
        $this->messageBuilder['Context']['ListId'] = $listId;
    }

    /*
     * @codeCoverageIgnore
     */

    public function setCategory($category)
    {
        $this->messageBuilder['Context']['Category'] = $category; 
    }

    /*
     * @codeCoverageIgnore
     */
    public function addProduct($product)
    {
        $this->messageBuilder['Content'][] = $product;
    }

    /*
     * @codeCoverageIgnore
     */
    public function setUserId($userId)
    {
        $this->messageBuilder['Context']['UserId'] = $userId;
    }


    /*
     * @codeCoverageIgnore
     */
    public function addExternalField($key, $value)
    {
        $this->messageBuilder['ExternalFields'][$key] = $value;
    }

    /*
     * @codeCoverageIgnore
     */
    public function send()
    {
        $datetime = new DateTime('NOW');
        $this->messageBuilder['EventDateTime'] = $datetime->format(DateTime::ISO8601);
        return $this->callHL(array('Data' => json_encode($this->messageBuilder)));
    }
}
