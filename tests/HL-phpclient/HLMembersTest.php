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

    /**
     * @covers HLMembers::getMembers()
     */
    public function testGetMembers()
    {
        $result = $this->object->getMembers(3753);
        $this->assertArrayHasKey('response',$result);
    }
}
