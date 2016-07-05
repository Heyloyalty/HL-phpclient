<?php namespace Phpclient;

class HLProductFeed
{
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }
}