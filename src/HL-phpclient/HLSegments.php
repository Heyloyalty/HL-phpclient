<?php namespace Phpclient;

class HLSegments extends HLBase
{
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }

    public function getSegments($listId)
    {
        $this->endpoint = 'lists/' . $listId . '/segments';
        return $this->call('GET', $this->endpoint);
    }

    public function getSegment($listId, $segmentId)
    {
        $this->endpoint = 'lists/' . $listId . '/segments/' . $segmentId;
        return $this->call('GET', $this->endpoint);
    }

    public function createSegment($listId, $filter)
    {
        $this->endpoint = 'lists/' . $listId . '/segments';
        return $this->call('POST', $this->endpoint, $filter);
    }

    public function updateSegment($listId, $segmentId, $filter)
    {
        $this->endpoint = 'lists/' . $listId . '/segments/' . $segmentId;
        return $this->call('PUT', $this->endpoint, $filter);
    }

    public function deleteSegment($listId, $segmentId)
    {
        $this->endpoint = 'lists/' . $listId . '/segments/' . $segmentId;
        return $this->call('DELETE', $this->endpoint);
    }
}
