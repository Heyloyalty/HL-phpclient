# HL-phpclient
Php client for heyloyalty api.

The client also has methods for using reseller endpoints, [how to become a reseller](http://heyloyalty.com/partner)
Accounts
Account users

## Installation
The recommended way to install HL-phpclient is through [Composer](https://getcomposer.org)
```php
composer require heyloyalty/hl-phpclient
```
## Simple example
Api key and secret are required from your [Heyloyalty account](http://heyloyalty.com)
```php
use Phpclient\HLMembers;
use Phpclient\HLClient;

$client = new HLClient('dkdndssgs','476yrjdnsgGYFTRTDDD');
$memberService = new HLMembers($client);
$members = $memberService->getMembers();
var_dump($members);
```

## Further documentation
Look at the code examples in the examples folder