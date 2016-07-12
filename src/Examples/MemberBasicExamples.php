<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLMembers;
/**
 * Basic examples showing have to use member endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 */
$api_key = 'your-api-key';
$api_secret = 'your-api-secret';
$list_id = 'your list id';
$member_id = 'your-member-id';
$client = new HLClient($api_key,$api_secret);
$memberService = new HLMembers($client);

// get all members from a list
$result = $memberService->getMembers($list_id);
var_dump('get all member from a list');
var_dump($result);

// get a specifik member from a list
$result = $memberService->getMember($list_id,$member_id);
var_dump('Get a specifik member from a list');
var_dump($result);

// get member by email
$result = $memberService->getMemberByEmail($list_id,'skou.rene@gmail.com');
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
$result = $memberService->getMembersByFilter($list_id,$filter);
var_dump('get member by filter');
var_dump($result);

// create a member on a list
$fields = [
    'email' => 'your-email'
];
$result = $memberService->create($list_id,$fields);
var_dump('create a member on a list');
var_dump($result);

// update a member on a list
$fields = [
    'email' => 'your-email'
];
$result = $memberService->update($list_id,$member_id,$fields);
var_dump('update a member on a list');
var_dump($result);

// delete a member
$result = $memberService->delete($list_id,'your-member-id-here');
var_dump('delete member on a list');
var_dump($result);