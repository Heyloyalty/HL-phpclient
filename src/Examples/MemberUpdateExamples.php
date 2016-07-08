<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLMembers;
/**
 * setup service
 */
$api_key = 'DTd7K5yfQFgyLcTS';
$api_secret = 'zo8z8pRy0bRKqMxojcq0t1jVjXzE623L';
$list_id = 2553;
$member_id = '582e0e1a-2f18-4956-b00f-43db5d48bc0a';
$client = new HLClient($api_key,$api_secret);
$memberService = new HLMembers($client);

/**
 * Update member with multi choice
 */

$fields = array(
    
);

$result = $memberService->update($list_id,$member_id,$fields);
var_dump('update member with multi choice');
var_dump($result);