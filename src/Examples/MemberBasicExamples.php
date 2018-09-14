<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLMembers;
/**
 * Basic examples showing have to use member endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 */
$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$listId = 'your list id';
$memberId = 'your-member-id';
$perPage = 'size of the page';
$page = 'current page';
$client = new HLClient($apiKey,$apiSecret);
$memberService = new HLMembers($client);

// get all members from a list
$result = $memberService->getMembers($listId);
var_dump('get all member from a list');
var_dump($result);

// get a specifik member from a list
$result = $memberService->getMember($listId,$memberId);
var_dump('Get a specifik member from a list');
var_dump($result);

// get paged members from a list
$result = $memberService->getPagedMembers($listId, $perPage, $page);
var_dump('Get paged members from a list');
var_dump($result);

// get member by email
$result = $memberService->getMemberByEmail($listId,'skou.rene@gmail.com');
var_dump('get member by email');
var_dump($result);

// get members by filter
/**
 * Here we are getting 1000 members on one page pr. call
 * with a filter that says where field name "postalcode" is not equal to 8000
 */
$filter = array(
    'page' => 1,
    'perpage' => 1000,
    'filter' => [
        'postalcode' => [
            'neq' => ['8000']
        ]
    ]
);
$result = $memberService->getMembersByFilter($listId,$filter);
var_dump('get member by filter');
var_dump($result);

// create a member on a list
$fields = [
    'email' => 'your-email'
];
$result = $memberService->create($listId,$fields);
var_dump('create a member on a list');
var_dump($result);

// update a member on a list
$fields = [
    'email' => 'your-email'
];
$result = $memberService->update($listId,$memberId,$fields);
var_dump('update a member on a list');
var_dump($result);

// delete a member
$result = $memberService->delete($listId,'your-member-id-here');
var_dump('delete member on a list');
var_dump($result);

// obscure a member on list
// This will overwrite given member, with data so all references is gone, and unsubcribe from the list given.
$result = $memberService->obscure($listId,'your-member-id-here');
var_dump('obscure member on a list');
var_dump($result);
