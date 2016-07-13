<?php namespace Phpclient;


class HLAbandonedBasketTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->client = new HLClient('DTd7K5yfQFgyLcTS','zo8z8pRy0bRKqMxojcq0t1jVjXzE623L');
        $this->object = new HLAbandonedBasket($this->client);
    }
    public function testGetAbandonedBasket()
    {
        $result = $this->object->getAbandonedBasket(1232);
        $this->assertArrayHasKey('response',$result);
    }
    
    public function testUpdate()
    {
        $result =$this->object->update(123421,array());
        $this->assertArrayHasKey('response',$result);
    }
}
