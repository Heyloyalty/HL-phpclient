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
 * Tests for HLMember.
 *
 * @since      Class available since Release 1.0.0
 */

class HLMembersTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->client = new HLClient('DTd7K5yfQFgyLcTS','zo8z8pRy0bRKqMxojcq0t1jVjXzE623L');
        $this->object = new HLMembers($this->client);
    }

    public function testGetMembersWithNOAuthentication()
    {
        $client = new HLClient('asda','sadas');
        $this->object = new HLMembers($client);
        $result = $this->object->getMembers(12);
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('401',json_decode($result['response'],true)['code']);
    }

    public function testGetMembers()
    {
        $result = $this->object->getMembers(3753);
        $this->assertArrayHasKey('response',$result);
        $this->assertArrayHasKey('members',json_decode($result['response'],true));
    }

    public function testGetMembersWithListIdDontExist()
    {
        $result = $this->object->getMembers(1300);
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }


    public function testgetMemberWithIdDontExist()
    {
        $result = $this->object->getMember(12,'12311');
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }

    public function testGetMemberByEmailThatDontExist()
    {
        $result = $this->object->getMemberByEmail(12,'some@mail.dk');
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }

    public function testCreateMemberWithMissingList()
    {
        $result = $this->object->create(12,array());
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }
    
    public function testUpdateMemberWithMissingList()
    {
        $result = $this->object->update(12,'member-id',array());
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }
    
    public function testdeleteMemberWithMissingList()
    {
        $result = $this->object->delete(12,'member-id');
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }

    public function testMemberByFilter()
    {
        $result = $this->object->getMembersByFilter(12,array());
        $this->assertArrayHasKey('response',$result);
        $this->assertEquals('404',json_decode($result['response'],true)['code']);
    }
}
