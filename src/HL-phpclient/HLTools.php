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
 * Class HLLogin
 * @package Phpclient
 */
class HLTools extends HLBase
{
    /**
     * HLLogin constructor.
     */
    public function __construct(HLClient $client)
    {
        $this->setToolsClient($client);
    }

    /**
     * @codeCoverageIgnore
     * Gets user information
     * Usage: Https://api1.heyloyalty.com/tools/v1
     * @param $credentials
     * @return mixed
     */
    public function getAccountInfo($credentials)
    {
        $this->endpoint = 'authorize';
        return $this->call('POST', $this->endpoint, $credentials);
    }

}
