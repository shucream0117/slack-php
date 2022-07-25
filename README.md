# SlackPHP

## Requirement

- PHP >= 7.4.x
- Incoming WebHook URL via Slack Apps
  - https://api.slack.com/messaging/webhooks

## Installation

via composer.

```console
$ composer require shucream0117/slack-php:3.0
```

## Usage

```php
$slack = new Slack('http://your-slack-incoming-webhook-url');

// send a message with mention
$slack->send('this message will be posted']);

// send a message with mention
$slack->send('mention!!', ['@HOGEFUGA']);
```
