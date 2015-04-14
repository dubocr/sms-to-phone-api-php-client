<?php
class Sending {
	public $silent;
	public $hidden;
	public $message;
	
	function __construct($body, $addresses, $silent = false, $hidden = false) {
		$this->message = new Sms($body, $addresses);
		$this->silent = $silent;
		$this->hidden = $hidden;
	}
	
	public function setSilent($silent) {
		$this->silent = $silent;
	}
	
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}
}
?>
