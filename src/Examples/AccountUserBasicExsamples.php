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
$api_key = 'your-api-key';
$api_secret = 'your-api-secret';
$account_id = 'your-account-id';
$user_id = 'your-user-id';
$client = new HLResellerClient($api_key,$api_secret);
$accountUserService = new HLAccountUsers($client);

/**
 * Get all users for an account.
 */
var_dump($accountUserService->getUsers($account_id));

/**
 * Get user for an account.
 */
var_dump($accountUserService->getUser($user_id,$account_id));

/**
 * Create a user on an account.
 */
$params = array(
    'name' => 'my name',
    'email'=> 'my email',
    'password' => 'my password'
);
var_dump($accountUserService->create($account_id,$params));

/**
 * Update a user on an account.
 */
$params = array(
    'name' => 'my name',
    'email'=> 'my email',
    'password' => 'my password'
);
var_dump($accountUserService->update($account_id,$user_id,$params));

/**
 * Delete a user on an account.
 */
var_dump($accountUserService->delete($account_id,$user_id));