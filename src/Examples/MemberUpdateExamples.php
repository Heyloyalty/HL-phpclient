<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLMembers;
/**
 * Member update exsamples,showing how you can update members when you have difference fields
 * Updating unsubscribed members will reactivate these members. We suggest creating a new member instead
 */
$apiKey = 'api-key';
$apiSecret = 'api-secret';
$listId = 1234;
$memberId = 'member-id';
$client = new HLClient($apiKey,$apiSecret);
$memberService = new HLMembers($client);

/**
 * Update member with multi choice.
 *
 * When you need to update a member with multi choice, single choice and sex you will
 * need to provide id's for the chosen options instead of the values.
 *
 * To get the id's you can use the getList method on HLlist, the result will show you the id's.
 *
 * The standard sex single choice field accepts 1 or 2, 1 for male and 2 for female.
 *
 * Date fields accepts in format Y-m-d.
 *
 * True/False fields accepts only true/false or 1/0.
 *
 * on succes this returns http 204
 */

$fields = array(
    'firstname' => 'René', //test
    'email' => 'your-email', //email
    'mobile' => 'your-mobile', //number
    'sex' => 1, //single choice
    'birthdate' => '1973-06-26', //date
    'stoerrelser' => [31980,31981,31982], //multi choice
    'nyheder' => true, //true/false
    'indkomst' => 31987, //single choice
    'last_buy' => '2016-07-12' //date
);

$result = $memberService->update($listId,$memberId,$fields);
var_dump('update member with multi choice');
var_dump($result);


/**
 * Patch a member.
 *
 * Requirements are just like put but instead of removing fields not parsed we just update the fields specified.
 * This also ensures that we do not need to parse email or mobile field.
 *
 */
$fields = [
    'firstname' => 'test'
];

$result = $memberService->patch($listId, $memberId, $fields);
var_dump('Patch member with firstname');
var_dump($result);


/**
 * Upsert member. 
 *
 * Upsert member takes fields as update as well as a unique field. This unique field must be part of the fields sent.
 * Note that we get an error if there's more than 1 member on the specific list with the specific field value so firstname is normally not a good idea for unique field.
 *
 */
$uniqueField = 'firstname';
$fields = [
    'firstname' => 'test',
    'mobile' => 12345678
];
$result = $memberService->upsert($listId, $uniqueField, $fields);
var_dump('Upsert member with unique firstname');
var_dump($result);
