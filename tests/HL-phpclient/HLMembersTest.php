<?php namespace Phpclient;
use Phpclient\HLMembers;
use Phpclient\HLClient;

class HLMembersTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->client = new HLClient('DTd7K5yfQFgyLcTS','zo8z8pRy0bRKqMxojcq0t1jVjXzE623L');
        $this->object = new HLMembers($this->client);
    }

    public function testGetMembers()
    {
        $result = $this->object->getMembers(3753);
        $this->assertArrayHasKey('response',$result);
    }
}
