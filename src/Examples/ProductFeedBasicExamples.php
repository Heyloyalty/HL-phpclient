<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLProductFeed;
/**
 * Basic examples showing have to use product feed and product feed mapping endpoints to read, create, update and delete.
 * You will need to fill out the variables below to test these examples.
 */
$apiKey = 'your-api-key';
$apiSecret = 'your-api-secret';
$productFeedId = 'your-product-feed-id';
$client = new HLClient($apiKey,$apiSecret);
$feedService = new HLProductFeed($client);

/**
 * Get all product feeds.
 */
var_dump($feedService->getProductFeeds());

/**
 * Get a specific product feed mapping.
 */
var_dump($feedService->getProductFeedMapping($productFeedId));

/**
 * Create a product feed.
 * Product feed url's accepts json or xml
 */
$params = array(
    'name' => 'my product feed name',
    'url' => 'url-to-your-productfeed'
);
var_dump($feedService->create($params));

/**
 * Update a product feed.
 */

$params = array(
    'name' => 'my product feed name',
    'url' => 'url-to-your-productfeed'
);
var_dump($feedService->update($productFeedId,$params));

/**
 * Delete a product feed.
 */

var_dump($feedService->delete($productFeedId));

/**
 * Create a product feed mapping.
 * Map your fields to reflect the fields on your feed
 *There are 10 custom fields you can map to what ever you need,
 */

$params = array(
    'product_feed_id' => 1,
    'feed_type' => 'json',
    'search_field' => 'name',
    'productid' => 'productid',
    'name'=> 'productname',
    'url'=> 'product_url',
    'originalPrice' => 'orig_price',
    'salePrice' => 'sale_price',
    'discount' => 'product_discount',
    'description' => 'description',
    'image_url' => 'img_url',
    'currency' => 'product_currency',
    'categoryName' => 'cat_name',
    'categoryid' => 'cat_id',
    'inStock' => 'instock',
    'customField1' => '',
    'customField2' => '',
    'customField3' => '',
    'customField4' => '',
    'customField5' => '',
    'customField6' => '',
    'customField7' => '',
    'customField8' => '',
    'customField9' => '',
    'customField10' => ''

);
var_dump($feedService->createMapping($params));

/**
 * Update a product feed mapping.
 */
var_dump($feedService->updateMapping($productFeedId,$params));