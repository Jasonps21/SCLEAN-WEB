<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct()
	{
		// Construct the parent class
		parent::__construct();		
	}

	public function generateUUID() {
		return $this->uuid->v4();
	}

	public function getCurrentDateTime($pattern = 'Y-m-d H:i:s') {
		return date($pattern);
	}

	public function generateResponse($message, $data, $error, $code, $meta = NULL) {
		$response["response"]["message"] = $message;
		$response["response"]["data"] = $data;
		$response["response"]["error"] = $error;
		$response["code"] = $code;
		return $response;
	}
}
