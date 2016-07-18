<?php
require('vendor/autoload.php');
use Phpclient\HLResellerClient;
use Phpclient\HLAccounts;
/**
 * Basic examples showing have to use account endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 *
 * You will need to be a reseller to use it
 */
$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$accountId = 'your-account-id';
$client = new HLResellerClient($apiKey,$apiSecret);
$accountService = new HLAccounts($client);

/**
 * Get all accounts.
 */
var_dump($accountService->getAccounts());

/**
 * Get a specific account.
 */
var_dump($accountService->getAccount($accountId));

/**
 * Get usage for an account.
 */
$params = array(
    'from' => '2016-06-01 00:00:00',
    'to' => '2016-06-31 23:59:59'
);
var_dump($accountService->getAccountUsage($accountId,$params));

/**
 * Create an account.
 * Type field can be 1, 2 or 3 for active, demo or suspened.
 */
$params = array(
    'name' => 'my account name',
    'firstname'=> 'my firstname',
    'lastname' => 'my lastname',
    'mobile' => 00000000,
    'phone' => 00000000,
    'address' => 'my address',
    'address_2' => 'me second address',
    'zipcode' => '8000',
    'city' => 'my city name',
    'cvr_no' => 12345678,
    'type' => 1
);
var_dump($accountService->create($params));

/**
 * Update an account.
 */
$params['firstname'] = 'another firname';
$params['lastname'] = 'another lastname';
var_dump($accountService->update($accountId,$params));

/**
 * Delete an account.
 */
var_dump($accountService->delete($accountId));