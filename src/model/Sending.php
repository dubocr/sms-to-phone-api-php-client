<?php
class Sending {
	public $silent;
	public $hidden;
	public $rate = 0;
	public $collapse = null;
	public $message;
	
	/**
	 * $body: content of the message
	 * $addresses: array or recipients
	 * $silent: see 'setSilent'
	 * $hidden: see 'setHiden'
	 */
	function __construct($body, $addresses, $silent = false, $hidden = false) {
		$this->message = new Sms($body, $addresses);
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
	 * Allows collapsing notification when sending multiple uniq messages
	 * $collapse: string. Each sending with equals $collapse will be collapsed
	 * $collapse=null: Notification not collapsed
	 */
	public function setCollapse($collapse) {
		$this->collapse = $collapse;
	}
	
	/**
	 * Define sending rate to send messages.
	 * $rate: integer. Number of message sent per minute
	 * $rate=0: Auto - Rate will be determined depending on phone restriction
	 */
	public function setRate($rate) {
		$this->rate = $rate;
	}
}
?>
