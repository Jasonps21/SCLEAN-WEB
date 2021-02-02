<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class PromosiController extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('Promosi_model');
	}	

	public function AllPromosiLaundry_get()
	{
		$response = $this->Promosi_model->daftar_promosi_api();

		$this->response($response["response"], $response["code"]);
    }    
}
