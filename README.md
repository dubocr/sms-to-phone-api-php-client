# Sms to Phone API Client Library for PHP #
A PHP client library for accessing Sms to Phone API  http://sms-to-phone.appspot.com/#use

## Requirements ##
* [PHP 5.2.1 or higher](http://www.php.net/)
* [PHP JSON extension](http://php.net/manual/en/book.json.php)
* [PHP OPEN SSL extension](http://php.net/manual/en/book.openssl.php)

## Developer Documentation ##
http://sms-to-phone.appspot.com/#use

## Basic Examples ##
See the examples/ directory for examples of the key client features.
Before starting,
* Set the 'API_TOKEN' in src/Config.php with the token generated [Here](https://sms-to-phone.appspot.com/#settings.jsp)
* Retrieve your 'DEVICE_ID'

### Bulk Example ###
```PHP
<?php

	require_once 'sms-to-phone-api-php-client/src/autoload.php'; // or wherever autoload.php is located

	$bulk = new BulkSending("Bulk campaign name");
	$bulk->addMessage("One message body", "PHONE_NUMBER_1");
	$bulk->addMessage("Another message body", "PHONE_NUMBER_2");
	$bulk->addMessage("One other", array("PHONE_NUMBER_3","PHONE_NUMBER_4"));

	try
	{
		$service = new MessagingService(Config::API_TOKEN);
		$service->sendBulkMessage($bulk, "DEVICE_ID");
	}
	catch (GoogleJsonException $e)
	{
		echo $e->getMessage();
	}
	catch (Exception $e)
	{
		echo "Request error : " . $e->getMessage();
	}
  
```

### Simple message Example ###
```PHP
<?php

	require_once 'sms-to-phone-api-php-client/src/autoload.php'; // or wherever autoload.php is located

	$sending = new Sending("One message body", "PHONE_NUMBER_1");

	try
	{
		$service = new MessagingService(Config::API_TOKEN);
		$service->sendMessage($sending, "DEVICE_ID");
	}
	catch (GoogleJsonException $e)
	{
		echo $e->getMessage();
	}
	catch (Exception $e)
	{
		echo "Request error : " . $e->getMessage();
	}
  
```

### Adjust sending rate ###
For some reasons (Android or carrier restrictions), you might need to adjust the sending rate.
You can define the number of SMS per minute to send using 'setRate' on a bulk or simple object.
The following example will sent 1 SMS each minute.
If rate is setted to '0' (default), the rate will be determined depending on your phone restriction.
```PHP
<?php
	$bulk = new BulkSending("Bulk campaign name");
	$bulk->addMessage("One message body", "PHONE_NUMBER_1");
	$bulk->addMessage("Another message body", "PHONE_NUMBER_2");
	$bulk->addMessage("One other", array("PHONE_NUMBER_3","PHONE_NUMBER_4"));
	
	$bulk->setRate(1); // 1 message per minute
	
	$service->sendBulkMessage($bulk, "DEVICE_ID");
```
