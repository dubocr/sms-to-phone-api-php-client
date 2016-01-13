<?php
class RequestClient {
	private $accessToken;
	private $deviceId;
	private $data;
	
	public function setDeviceId($deviceId)
	{
		$this->deviceId = $deviceId;
	}
	
	public function setAccessToken($accessToken)
	{
		$this->accessToken = $accessToken;
	}
	
	public function setData($data)
	{
		$this->data = $data;
	}
	
	public function execute($url) {
		$json = json_encode($this->data);
		$options = array(
			'http' => array(
				'header'  => "Content-Type: application/json\r\n".
					"Content-Length: ".strlen($json)."\r\n".
					"Authorization: ".$this->accessToken."\r\n",
				'method'  => 'POST',
				'content' => $json,
				'ignore_errors' => true,
			),
		);
		//var_dump($this->data);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$data = json_decode($result);
		//var_dump($http_response_header);
		if($data == null && strpos($http_response_header[0], '204') === false)
		{
			throw new Exception($http_response_header[0].' - '.$url);
		}
		else
		{
			if(isset($data->error))
			{
				throw GoogleJsonException::fromJson($data);
			}
			else 
				return $data;
		}
	}
}
?>
