<?php

require_once __DIR__ . '/vendor/autoload.php';

$configService = new \App\Service\ConfigService();
$curlSender = new \App\Service\CurlSender();
$emailSender = new \App\Service\EmailSender();

$logger = new \App\Log\LogToFile($configService);
$database = new \App\Database\Database($configService);
$app = new \App\App\App($database, $configService, $curlSender, $emailSender, $logger);

$app->run(7, "test@gmail.com");
