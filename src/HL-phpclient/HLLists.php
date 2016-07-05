<?php namespace Phpclient;

class HLLists
{
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }
}