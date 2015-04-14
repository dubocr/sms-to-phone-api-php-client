<?php
class GoogleJsonException extends Exception {
	private $errors;
	
	static function fromJson($json)
	{
		return new GoogleJsonException($json->error->message, $json->error->code, $json->error->errors);
	}
	
	function __construct($message, $code, $errors)
	{
		parent::__construct($message, $code);
		$this->errors = $errors;
	}
	
	function getErrors()
	{
		return $this->errors;
	}
}
?>
