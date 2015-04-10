AndroidPushNotification
=========

Package to enable sending push notifications to android devices.

Installation
----

Update your `composer.json` file to include this package as a dependency
```json
"piyushpatil/androidpushnotification": "dev-master"
```

Register the PushNotification service provider by adding it to the providers array in the `config/app.php` file.
```php
'providers' => [
     'Piyushpatil\Androidpushnotification\AndroidpushnotificationServiceProvider',
]
```

Alias the PushNotification facade by adding it to the aliases array in the `config/app.php` file.
```php
'aliases' => [
   'PushNotification' => 'Piyushpatil\Androidpushnotification\Facades',
]
```

# Configuration

Copy the config file into your project by running
```
 php artisan vendor:publish --provider="piyushpatil/androidpushnotification" --tag="config"

```

This will generate a config file like this
```php

    return [
    'Android' => [
        'environment' => 'production',
        'apiKey' => 'yourAPIKey',
        'service' => 'gcm'
    ]
];

```
Where all first level keys corresponds to an service configuration, each service has its own properties, android for instance have `apiKey`. You can set as many services configurations as you want, one for each app.

##### Dont forget to set `service` key to identify Android `'service'=>'gcm'`


Where app argument `Android` refers to defined service in config file.
To multiple devices and optioned message:
```php

PushNotification::app('Android')
                ->to($deviceToken)
                ->send('Hello World, i`m a push message');


$devices = PushNotification::DeviceCollection(array(
    PushNotification::Device('token', array('badge' => 5)),
    PushNotification::Device('token1', array('badge' => 1)),
    PushNotification::Device('token2')
));

collection = PushNotification::app('Android')
    ->to($devices)
    ->send($message);

// get response for each device push
foreach ($collection->pushManager as $push) {
    $response = $push->getAdapter()->getResponse();
}

// access to adapter for advanced settings
$push = PushNotification::app('appNameAndroid');
$push->adapter->setAdapterParameters(['sslverifypeer' => false]);
```
This package is wrapps [Notification Package] and adds some flavor to it.

#### Usage advice
This package should be used with [Laravel Queues], so pushes dont blocks the user and are processed in the background, meaning a better flow.



[Notification Package]:https://github.com/Ph3nol/NotificationPusher
[Laravel Queues]:http://laravel.com/docs/queues
