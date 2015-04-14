<?php
class Sms {
	public $addresses = array();
	public $body = false;
	
	function __construct($body, $addresses) {
		$this->body = $body;
		if(is_array($addresses))
			$this->addresses = $addresses;
		else
			$this->addresses[] = $addresses;
	}
	
	public function addAddress($address) {
		$this->addresses[] = $address;
	}
	
	public function setBody($body) {
		$this->body = $body;
	}
}
?>
