<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLLists;
/**
 * Basic examples showing have to use list endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 */
$api_key = 'your-api-key';
$api_secret = 'your-api-secret';
$list_id = 'your list id';
$member_id = 'your-member-id';
$client = new HLClient($api_key,$api_secret);
$listsService = new HLLists($client);

/**
 * Get all lists on an account.
 */
var_dump($listsService->getLists());

/**
 * Get a specific list.
 */
var_dump($listsService->getList($list_id));

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

var_dump($listsService->update($list_id,$params));

/**
 * Delete a list.
 */
var_dump($listsService->delete($list_id));