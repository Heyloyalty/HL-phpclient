/*
* This file is part of the hl-phpclient package.
*
* (c) René Skou <skou.rene@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLLists;
/**
 * Basic examples showing have to use list endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 */
$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$listId = 'your list id';
$memberId = 'your-member-id';
$client = new HLClient($apiKey,$apiSecret);
$listsService = new HLLists($client);

/**
 * Get all lists on an account.
 */
var_dump($listsService->getLists());

/**
 * Get a specific list.
 */
var_dump($listsService->getList($listId));

/**
 * Create a list.
 */

$params = array(
    '0' => [
        'type' => 'fixed',
        'name' => 'email',
        'format' => 'text'
    ],
    '1' => [
        'type' => 'fixed',
        'name' => 'mobile',
        'format' => 'Number'
    ],
    '2' => [
        'type' => 'custom',
        'name' => 'subscriber_no',
        'format' => 'text',
        'label' => 'Subscriber no',
        'fallback' => '',
        'order' => 2
    ],
    '3' => [
        'type' => 'custom',
        'name' => 'name1',
        'format' => 'text',
        'label' => 'Name1',
        'fallback' => '',
        'order' => 3
    ]
);

var_dump($listsService->create($params));

/**
 * Update a list.
 * Using params from the create method.
 */

var_dump($listsService->update($listId,$params));

/**
 * Delete a list.
 */
var_dump($listsService->delete($listId));