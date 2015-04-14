<?php
class MessagingService {
	private $client;
	private $name = 'messaging';
	private $version = 'v1';
	

	function __construct($token) {
		$this->client = new RequestClient();
		$this->client->setAccessToken($token);
	}
	
	public function sendMessage($data, $deviceId)
	{
		$this->client->setData($data);
		$this->client->execute($this->buildUrl(__FUNCTION__.'/'.$deviceId));
	}
	
	public function sendBulkMessage($data, $deviceId)
	{
		$this->client->setData($data);
		$this->client->execute($this->buildUrl(__FUNCTION__.'/'.$deviceId));
	}
	
	private function buildUrl($url)
	{
		return Config::API_ENDPOINT_URL.$this->name.'/'.$this->version.'/'.$url.'/';
	}
}
?>
