<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLMembers;
/**
 * Import examples showing have to import new members or update existing ones.
 * You will need to fill out the variables below to test these examples.
 */
$apiKey = 'DTd7K5yfQFgyLcTS';
$apiSecret = 'zo8z8pRy0bRKqMxojcq0t1jVjXzE623L';
$listId = 3753;
$client = new HLClient($apiKey,$apiSecret);
$memberService = new HLMembers($client);
$params = array(
        'duplicate_field' => 'email',
        'handle_existing' => 'update',
        'date_format' => 'Y-m-d',
        'fields_selected' => array(
             'email'
        ),
        'skip_header_line' => false,
        'trigger_autoresponder' => false,
        'sendErrorsTo' => 'skou.rene@gmail.com'
);
$result = $memberService->import($listId,$params,realpath('simple-member.csv'));
var_dump($result);