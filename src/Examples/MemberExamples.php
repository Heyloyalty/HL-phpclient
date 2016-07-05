<?php
use Phpclient\HLMembers;
use Phpclient\HLClient;

/**
 * setup service
 */
$api_key = '';
$api_secret = '';
$list_id = 0;
$member_id = '';
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

// create a member on a list
$fields = [
    'email' => 'skou.rene@gmail.com'
];
$result = $memberService->create($list_id,$fields);
var_dump('create a member on a list');
var_dump($result);

