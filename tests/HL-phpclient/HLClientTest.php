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

class HLClientTest extends \PHPUnit_Framework_TestCase
{
    
    public function testHLClient()
    {
        $client = new HLClient('key','secret');
        $this->assertEquals('key',$client->key);
        $this->assertEquals('secret',$client->secret);
    }
}
