# HL-phpclient
Php client for heyloyalty api

## Installation
The recommended way to install HL-phpclient is through [Composer](https://getcomposer.org)
```php
composer require heyloyalty/hl-phpclient
```
## Simple example
```php
use Phpclient\HLMembers;
use Phpclient\HLClient;

$client = new HLClient('dkdndssgs','476yrjdnsgGYFTRTDDD');
$memberService = new HLMembers($client);
$members = $memberService->getMembers();
var_dump($members);
```