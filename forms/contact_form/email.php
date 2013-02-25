<?php

/**
 * Copyright (c) 2012 Maurer Innovation, LLC
 *
 * @author Jason Maurer <jason@maurerinnovation.com>
 * @date 10/22/2012
 */

class HQ_Email
{

	private $_subject;
	private $_sendto;
	private $_fullname;
	private $_email;
	private $_message;

	public function __construct($sendto, $subject)
	{
		$this->_sendto = $sendto;
		$this->_subject = $subject;
	}

	private function _sanitize($value)
	{
		$a = htmlentities($value);
		return $a;
	}

	public function set($fullname, $email, $message)
	{
		$this->_fullname = $this->_sanitize($fullname);
		$this->_email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$this->_message = $this->_sanitize($message);
	}

	public function send()
	{
		$from = $this->_fullname . '<' . $this->_email . '>';

		$headers = 'From: ' . $from . "\n";
		$headers .= 'Reply-To: ' . $this->_email;

		mail($this->_sendto, $this->_subject, $this->_message, $headers);
	}

}

?>