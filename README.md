<img src="https://travis-ci.org/SkouRene/HL-phpclient.svg?branch=master" /> [![Code Climate](https://codeclimate.com/github/SkouRene/HL-phpclient/badges/gpa.svg)](https://codeclimate.com/github/SkouRene/HL-phpclient) [![codecov](https://codecov.io/gh/SkouRene/HL-phpclient/branch/master/graph/badge.svg)](https://codecov.io/gh/SkouRene/HL-phpclient)

# HL-phpclient
Php client for heyloyalty api.

The client also has methods for using reseller endpoints, [how to become a reseller](http://heyloyalty.com/partner)
Accounts
Account users

This client contains all methods for interacting with Heyloyalty api except the import method on lists, it will be included along with examples soon.


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
$members = $memberService->getMembers(12);
var_dump($members);
```

## Further documentation
Look at the code examples in the examples folder
