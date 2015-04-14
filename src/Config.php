<?php
class Config {
	/*
	* sms-to-phone server configuration
	*/
	const SETTINGS_URL = 'https://sms-to-phone.appspot.com/#settings.jsp';
	const API_ENDPOINT_URL = 'https://sms-to-phone-hrd.appspot.com/_ah/api/'; // Endpoint URLs

	/*
	* User configuration, need to be defined and kept secure
	*/
	const API_TOKEN = "YOUR_PRIVATE_API_TOKEN"; // Your private API token. To obtain a token, visit https://sms-to-phone.appspot.com/#settings.jsp
}
?>
