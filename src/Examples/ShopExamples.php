<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLShops;

$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$listId = 'whatever list you want';
$client = new HLClient($apiKey, $apiSecret);
$webhookService = new HLShop($client);

// These are the parameters you need.
$params = [
    'list_id' => $listId,
    'name' => $name,
    'username' => 'sting',
    'password' => str_random(10),
    'user_username' => 'string',
    'user_password' => str_random(10)
];

// Get shops on a list
var_dump($webhookService->getShops($listId));

// Create new shops on a specific list
var_dump($webhookService->createShops($listId, $params));

