<?php namespace Phpclient;
    /*
         * This file is part of the hl-phpclient package.
         *
         * (c) René Skou <skou.rene@gmail.com>
         *
         * For the full copyright and license information, please view the LICENSE
         * file that was distributed with this source code.
         */

class HLLinkTracking extends HLBase
{
    public function __construct(HLClient $client)
    {
        $this->setClient($client);
    }

    public function getSettings($id)
    {
        $this->endpoint = 'lists/' . $id . '/options/link_tracking';
        return $this->call('GET',$this->endpoint);
    }

    public function update($listId,$params)
    {
        $this->endpoint = 'lists/' . $listId . '/options/link_tracking';
        return $this->call('PUT',$this->endpoint,$params);
    }
}
