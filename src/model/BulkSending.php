<?php
class BulkSending {
	public $name;
	public $silent;
	public $hidden;
	public $rate = 0;
	public $messages = array();
	
	/**
	 * $name: name of this bulk (will appear in phone notification)
	 * $silent: see 'setSilent'
	 * $hidden: see 'setHiden'
	 */
	function __construct($name, $silent = false, $hidden = false) {
		$this->name = $name;
		$this->silent = $silent;
		$this->hidden = $hidden;
	}
	
	/**
	 * Silence sending on the phone (no notification)
	 * $silent: boolean.
	 * true: No notification
	 * false: Each sending notified
	 */
	 public function setSilent($silent) {
		$this->silent = $silent;
	}
	
	/**
	 * Hide sending on the phone (SMS not saved in outbox). For Android < 4 or SmsToPhone as default SMS app
	 * $hidden: boolean.
	 * true: SMS not saved in outbox
	 * false: SMS saved in outbox
	 */
	 public function setHidden($hidden) {
		$this->hidden = $hidden;
	}
	
	/**
	 * Define sending rate to send messages.
	 * $rate: integer. Number of message sent per minute
	 * $rate=0: Auto - Rate will be determined depending on phone restriction
	 */
	public function setRate($rate) {
		$this->rate = $rate;
	}
	
	/**
	 * Add a message to this bulk
	 * $body: content of the message
	 * $addresses: array or recipients
	 */
	public function addMessage($body, $addresses) {
		$this->messages[] = new Sms($body, $addresses);
	}
}
?>
