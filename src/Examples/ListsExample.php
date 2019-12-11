<?php

require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\V2\HLLists;
/**
 * Basic example showing have to use list endpoint to patch.
 * You will need to fill out the variables below to test these examples.
 */
$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$listId = 'your-list-id';
$client = new HLClient($apiKey, $apiSecret);
$listsService = new HLLists($client);

/**
 * Patch a list.
 * The PATCH method affects the resource identified by the params
 * new resources will be created, and existing ones modified
 * See api documentation for more information
 */

$params = [
    'fields' => [
        [
            'type' => 'fixed',
            'name' => 'lastname',
            'format' => 'text'
        ],
        [
            'type' => 'custom',
            'name' => 'customer_type',
            'label' => 'Kunde type',
            'format' => 'text'
        ],
        [
            'format' => 'number',
            'name' => 'total_orders',
            'label' => 'Total antal ordre',
            'type' => 'custom'
        ],
        [
            'format' => 'date',
            'name' => 'last_order_date',
            'label' => 'Sidste købs dato',
            'type' => 'custom'
        ],
        [
            'format' => 'choice',
            'name' => 'selected_category',
            'label' => 'Valgt kategori',
            'type' => 'custom',
            'options' => [
                ['label' => 'Kat'],
                ['label' => 'Hund']
            ]
        ]
    ]
];

var_dump($listsService->patch($listId, $params));
