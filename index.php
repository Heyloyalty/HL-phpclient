<?php

require 'vendor/autoload.php';

use Phpclient\HLClient;
use Phpclient\HLMembers;

$api_key = 'DTd7K5yfQFgyLcTS';
$api_secret = 'zo8z8pRy0bRKqMxojcq0t1jVjXzE623L';
$julekalenderen = 2553;
$client = new HLClient($api_key,$api_secret);
$memberService = new HLMembers($client);

$response = $memberService->getMembers($julekalenderen);

var_dump($response);