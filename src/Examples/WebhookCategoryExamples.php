<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLWebhookCategory;

$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$client = new HLClient($apiKey,$apiSecret);
$categoryService = new HLWebhookCategory($client);

//basic example without products
$data = [
    'TriggerDisplayName' => 'webhook-category',
    'EventDateTime' => '2016-12-20T13:00:00Z',
    'Context' => [
        'Category' => 'DetteErEnTest',
        'ListId' => 88,
        'UserId' => 'sk@heyloyalty.com'
    ],
    'Content' => [
        []
    ],
    'ExternalFields' => [
        'name' => 'test',
        'area' => 'damn'
    ]
];

var_dump($categoryService->sendRaw($data));

//raw example with products
$data = [
    'TriggerDisplayName' => 'webhook-category',
    'EventDateTime' => '2016-12-20T13:00:00Z',
    'Context' => [
        'Category' => 'DetteErEnTest',
        'ListId' => 88,
        'UserId' => 'sk@heyloyalty.com'
    ],
    'Content' => [
        [
            'ProductId' => 1,
            'ProductName' => 'hello'
        ],
        [
            'ProductId' => 1,
            'ProductName' => 'world'
        ]
    ],
    'ExternalFields' => [
        'name' => 'test',
        'area' => 'damn'
    ]
];

var_dump($categoryService->sendRaw($data));

//example using builder parts and send.
$categoryService->setListId(88);
$categoryService->setCategory('DetteErEnTest');
$categoryService->addProduct(['ProductId' => 1, 'ProductName' => 'hello']);
$categoryService->setUserId('sk@heyloyalty.com');
$categoryService->addExternalField('name', 'test');
var_dump($categoryService->send());
