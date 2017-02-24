<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLWebhooks;

$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$listId = 'whatever list you want';
$client = new HLClient($apiKey, $apiSecret);
$webhookService = new HLWebhooks($client);

// These are the setting you can subsribe to getting webhooks from. Simply set the value to 1 for the events you want to subscribe to (default is 0 if they are not filled)
$settings = ['subscribe' => 1, 'update' => 1, 'unsubscribe' => 1, 'spamComplaint' => 1, 'click' => 1, 'open' => 1, 'hardbounce' => 1];


// Get webhooks setup on a list
var_dump($webhookService->getWebhooks($listId));

// Create new webhook on a specific list
$url = 'http://MyAwesomeSite.org';
var_dump($webhookService->create($listId, $url, $settings, 'iWantTheErrorMessages@mydomain.dk'));

// Update a webhook on a specific list
var_dump($webhookService->update($listId, $url, $settings, 'newEmail@mydomain.dk'));

// Delete a webhook on a specific list
var_dump($webhookService->delete($listId, 'webhookIdFetchedByGet'));


