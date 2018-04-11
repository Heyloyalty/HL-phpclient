<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLLists;
/**
 * Basic examples showing have to use list endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 */
$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$listId = 'your-list-id';
$memberId = 'your-member-id';
$client = new HLClient($apiKey,$apiSecret);
$listsService = new HLLists($client);

/**
 * Get all lists on an account.
 */
var_dump($listsService->getLists());

/**
 * Get a specific list.
 */
var_dump($listsService->getList($listId));

/**
 * Create a list.
 */

$params = [
    'name' => 'Api test liste',
    'country_id' => 1,
    'duplicates' => 'disallow',
    'fields' => [
        [
            'type' => 'fixed',
            'name' => 'email',
            'format' => 'text'
        ],
        [
            'type' => 'fixed',
            'name' => 'firstname',
            'format' => 'text'
        ],
        [
            'type' => 'fixed',
            'name' => 'lastname',
            'format' => 'text'
        ],
        [
            'type' => 'fixed',
            'name' => 'mobile',
            'format' => 'number'
        ],
        [
            'type' => 'fixed',
            'name' => 'sex',
            'format' => 'choice'
        ],
        [
            'type' => 'fixed',
            'name' => 'birthdate',
            'format' => 'date'
        ],
        [
            'type' => 'fixed',
            'name' => 'country',
            'format' => 'choice'
        ],
        [
            'type' => 'fixed',
            'name' => 'city',
            'format' => 'text'
        ],
        [
            'type' => 'fixed',
            'name' => 'address',
            'format' => 'text'
        ],
        [
            'type' => 'fixed',
            'name' => 'postalcode',
            'format' => 'number'
        ],
        [
            'type' => 'fixed',
            'name' => 'reference',
            'format' => 'text'
        ],
        [
        'type' => 'custom',
        'name' => 'customer_id',
        'label' => 'Kunde id',
        'format' => 'number'
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
        'format' => 'number',
        'name' => 'total_products_bought',
        'label' => 'Total antal produkter købt',
        'type' => 'custom'
    ],
    [
        'format' => 'number',
        'name' => 'average_number_of_products',
        'label' => 'Gennemsnitlig antal produkter',
        'type' => 'custom'
    ],
    [
        'format' => 'number',
        'name' => 'average_spent_per_order',
        'label' => 'Gennemsnitlig pris per order',
        'type' => 'custom'
    ],
    [
        'format' => 'number',
        'name' => 'spent_last_order',
        'label' => 'Brugt ved sidste order',
        'type' => 'custom'
    ],
    [
        'format' => 'number',
        'name' => 'total_spent',
        'label' => 'Total forbrug',
        'type' => 'custom'
    ],
    [
        'format' => 'date',
        'name' => 'last_order_date',
        'label' => 'Sidste købs dato',
        'type' => 'custom'
    ],
    [
        'format' => 'date',
        'name' => 'first_order_date',
        'label' => 'Første købs dato',
        'type' => 'custom'
    ]
    ]
]; 
var_dump($listsService->create($params));

/**
 * Update a list.
 * Using params from the create method.
 */

var_dump($listsService->update($listId,$params));

/**
 * Delete a list.
 */
var_dump($listsService->delete($listId));
