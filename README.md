# SlackPHP

## Requirement

- PHP 7.1.x

## Installation
via composer.

```console
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar require shucream0117/slack-php:dev-master
```

## Usage

```php
$slack = new Slack('http://your-slack-incoming-webhook-url');
$slack->send('this message will be posted');
```
