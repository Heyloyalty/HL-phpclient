<?php
require('vendor/autoload.php');
use Phpclient\HLResellerClient;
use Phpclient\HLAccountUsers;
/**
 * Basic examples showing have to use account endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 *
 * You will need to be a reseller to use it
 */
$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$accountId = 'your-account-id';
$userId = 'your-user-id';
$client = new HLResellerClient($apiKey,$apiSecret);
$accountUserService = new HLAccountUsers($client);

/**
 * Get all users for an account.
 */
var_dump($accountUserService->getUsers($accountId));

/**
 * Get user for an account.
 */
var_dump($accountUserService->getUser($userId,$accountId));

/**
 * Create a user on an account.
 */
$params = array(
    'name' => 'my name',
    'email'=> 'my email',
    'password' => 'my password'
);
var_dump($accountUserService->create($accountId,$params));

/**
 * Update a user on an account.
 */
$params = array(
    'name' => 'my name',
    'email'=> 'another email',
    'password' => 'another password'
);
var_dump($accountUserService->update($accountId,$userId,$params));

/**
 * Delete a user on an account.
 */
var_dump($accountUserService->delete($accountId,$userId));