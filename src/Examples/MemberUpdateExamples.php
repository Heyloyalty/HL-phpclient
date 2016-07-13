/*
* This file is part of the hl-phpclient package.
*
* (c) René Skou <skou.rene@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
<?php
require('vendor/autoload.php');
use Phpclient\HLClient;
use Phpclient\HLMembers;
/**
 * Member update exsamples,showing how you can update members when you have difference fields
 */
$apiKey = 'api-key';
$apiSecret = 'api-secret';
$listId = 123;
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