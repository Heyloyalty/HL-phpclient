<?php namespace Phpclient;

class HLWebhooks extends HLBase
{
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }

    public function getWebhooks($listId)
    {
        $this->endpoint = 'lists/' . $listId . '/webhooks';
        return $this->call('GET', $this->endpoint);
    }

    public function create($listId, $url, array $settings=array(), $contactEmail = '')
    {
        $this->endpoint = 'lists/' . $listId . '/webhooks';
        $data = $this->setupData($url, $settings, $contactEmail);
        return $this->call('POST', $this->endpoint, $data);
    }

    public function update($listId, $webhookId, $url, array $settings=array(), $contactEmail = '')
    {
        $this->endpoint = 'lists/' . $listId . '/webhooks/' . $webhookdId;
        $data = $this->setupData($url, $settings, $contactEmail);
        return $this->call('PUT', $this->endpoint, $data);
    }

    public function delete($listId, $webhookId)
    {
        $this->endpoint = 'lists/' . $listId  . '/webhooks' . $webhookId;
        return $this->call('DELETE', $this->endpoint);
    }

    protected function setupData($url, $settings, $contactEmail)
    {
        $data = array('url' => $url, 'contact_email' => $contactEmail);
        $data['webhookTriggers'] = $this->setActiveWebhooks($settings);
        return $data;
    }

    protected function setActiveWebhooks(array $settings)
    {
        $availableTriggers = array('subscribe' => 0, 'update' => 0, 'unsubscribe' => 0, 'spamComplaint' => 0, 'click' => 0, 'open' => 0, 'hardbounce' => 0);
        foreach ($settings as $setting => $active) {
            if (!isset($availableTriggers[$setting])) {
                throw new Exception('Invalid setting supplied for webhooks: ' . $setting);
            }
            $availableTriggers[$setting] = $active;
        }
        return $availableTriggers;
    }
}
