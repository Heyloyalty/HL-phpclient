<?php namespace Phpclient;


class HLListsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $client = new HLClient('DTd7K5yfQFgyLcTS','zo8z8pRy0bRKqMxojcq0t1jVjXzE623L');
        $this->object = new HLLists($client);
    }

    public function testGetLists()
    {
        $result = $this->object->getLists();
        $this->assertArrayHasKey('response',$result);
        $this->assertInternalType('string',$result['response']);
    }

    public function testGetListWithMissingList()
    {
        $result = $this->object->getList(12);
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }
}
