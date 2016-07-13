<?php namespace Phpclient;


class HLProductFeedTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->client = new HLClient('DTd7K5yfQFgyLcTS','zo8z8pRy0bRKqMxojcq0t1jVjXzE623L');
        $this->object = new HLProductFeed($this->client);
    }
    
    public function testGetProductFeeds()
    {
        $result = $this->object->getProductFeeds();
        $this->assertArrayHasKey('response',$result);
    }
    
    public function testGetProductFeedMapping()
    {
        $result = $this->object->getProductFeedMapping(134);
        $this->assertArrayHasKey('response',$result);
    }
    public function testCreate()
    {
        $result = $this->object->create(array());
        $this->assertArrayHasKey('response',$result);
    }
    public function testUpdate()
    {
        $result = $this->object->update(4764,array());
        $this->assertArrayHasKey('response',$result);
    }
    public function testDelete()
    {
        $result = $this->object->delete(134);
        $this->assertArrayHasKey('response',$result);
    }
    public function testCreateMapping()
    {
        $result = $this->object->createMapping(array());
        $this->assertArrayHasKey('response',$result);
    }
    public function testUpdateMapping()
    {
        $result = $this->object->updateMapping(134,array());
        $this->assertArrayHasKey('response',$result);
    }
}
