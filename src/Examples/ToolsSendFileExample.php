<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLTools;
/**
 * File examples showing have to export members in csv to email.
 * You will need to fill out the variables below to test these examples.
 */
$apiKey = 'api-key';
$apiSecret = 'api-secret';
$email = 'email';
$client = new HLClient($apiKey,$apiSecret);
$toolsService = new HLTools($client);
$params = array(
    'fields_selected' => array(
        'email'
    ),
);
$result = $toolsService->sendFile($email, $params, realpath('export.csv'));
var_dump($result);

