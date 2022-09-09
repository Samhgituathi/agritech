<?php

// composer require messente/messente-api-php

require_once __DIR__.'/vendor/autoload.php';

use Messente\Api\Api\OmnimessageApi;
use Messente\Api\Model\Omnimessage;
use Messente\Api\Configuration;
use Messente\Api\Model\SMS;

$config = Configuration::getDefaultConfiguration()
    ->setUsername('310b7ec7ca4142ab8a1843699cce70a6')
    ->setPassword('d9a6e8f0e3964189a08c44465eecc482');

$apiInstance = new OmnimessageApi(
    new GuzzleHttp\Client(),
    $config
);

$omnimessage = new Omnimessage([
    'to' => '<0758854853>',
]);

$sms = new SMS(
    [
        'text' => 'hello sms',
        'sender' => '<walter>',
    ]
);

$omnimessage->setMessages([$sms]);

try {
    $result = $apiInstance->sendOmnimessage($omnimessage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling sendOmnimessage: ', $e->getMessage(), PHP_EOL;
}

