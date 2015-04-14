<?php
require_once("../src/autoload.php");

$DEVICE_ID = "YOUR_DEVICE_ID_IMEI"; // The device IMEI used to send messages. Visit http://sms-to-phone.appspot.com/#settings.jsp to get this IMEI

/* Another example to send unique message silently */
$sending = new Sending("Test message to send", "0123456780");

try
{
    $service = new MessagingService(Config::API_TOKEN);
	$service->sendMessage($sending, $DEVICE_ID);
	echo "Messages sent";
}
catch (GoogleJsonException $e)
{
    echo $e->getMessage().'<br/>';
	switch($e->getCode())
	{
		case 401 : 
			echo "You must provide a valid authentication token. Please visit <a href='".Config::SETTINGS_URL."' target='_blank'>".Config::SETTINGS_URL."</a> to obtain a token";
		break;
		case 404 : 
			echo "The provided device is not found. Please visit <a href='".Config::SETTINGS_URL."' target='_blank'>".Config::SETTINGS_URL."</a> to obtain the device IMEI";
		break;
	}
}
catch (Exception $e)
{
    echo "Request error : " . $e->getMessage();
}
?>