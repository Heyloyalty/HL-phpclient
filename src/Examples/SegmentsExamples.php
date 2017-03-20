<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLSegments;

$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$listId = 'your list id';
$segmentId = 'Your segment id';
$client = new HLClient($apiKey,$apiSecret);
$segmentService = new HLSegments($client);

var_dump($segmentService->getSegments($listId));

var_dump($segmentService->getSegment($listId, $segmentId));

$logic = [
    'logic' => 'and',
    'filters' => [
        'firstname' => [
            'eq' => [
                'test',
            ],
        ],
    ],
    'name' => 'Navn er test',
];
var_dump($segmentService->createSegment($listId, $logic));

var_dump($segmentService->updateSegment($listId, $segmentId, $logic));

var_dump($segmentService->deleteSegment($listId, $segmentId));


