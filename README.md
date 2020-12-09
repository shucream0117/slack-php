# SlackPHP

## Requirement

- PHP 7.4.x

## Installation

via composer.

```console
$ composer require shucream0117/slack-php:2.0
```

## Usage

```php
$slack = new Slack('http://your-slack-incoming-webhook-url');

// specify channel(optional)
$slack->setChannel('somewhere');

// set user name(optional)
$slack->setUserName('someone');

// set icon emoji
$slack->setIconEmoji('ok_woman');

// link names(optional)
$slack->setLinkNames(true);

// send a message
$slack->send('this message will be posted');
```
