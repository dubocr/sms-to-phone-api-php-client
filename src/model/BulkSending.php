<?php
class BulkSending {
	public $name;
	public $silent;
	public $hidden;
	public $messages = array();
	
	function __construct($name, $silent = false, $hidden = false) {
		$this->name = $name;
		$this->silent = $silent;
		$this->hidden = $hidden;
	}
	
	public function setSilent($silent) {
		$this->silent = $silent;
	}
	
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}
	
	public function addMessage($body, $addresses) {
		$this->messages[] = new Sms($body, $addresses);
	}
}
?>
