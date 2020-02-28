[![Build Status](https://travis-ci.org/stgalkin/ringcentral-webhooks.svg?branch=master)](https://travis-ci.org/stgalkin/ringcentral-webhooks)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)



## PHP RingCentral Webhook

Easy to use PHP library to post messages in RingCentral via RingCentral Webhooks

## Package Installation - Composer

You can install the package via composer:

```bash
composer require stgalkin/ringcentral-webhooks
```

### Usage
Create a Simple Message if you want to sent a message to your channel.

```php
$adapter = new \Stgalkin\RingCentral\RingCentralAdapter(<WEBHOOK_URL>);
$message  = new \Stgalkin\RingCentral\Message\SimpleMessage('Title', 'Message');
$adapter->send($message);
```

### Custom message
Feel free to extends the **AbstractMessage** or **MessageContract** and implement you own logic!

### Documentation
More examples and documentation you may find here: [RingCentral Developers](https://developers.ringcentral.com/guide/team-messaging/manual/webhooks)

### License

This PHP RingCentral Webhook adapter is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
