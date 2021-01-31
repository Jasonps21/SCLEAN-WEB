<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class LaundryController extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('Laundry_model');
	}	

	public function AllLaundry_get()
	{
		$response = $this->Laundry_model->daftar_laundry_api();

		$this->response($response["response"], $response["code"]);
    }
    
    public function detailLaundry_get()
	{
		$id = $this->input->get('id');

		$filter = array();
		$filter['id'] = $this->post('id');		

		foreach ($filter as $key => $value) {
			if (empty($value)) {
				$code = 200;
				$respon['message'] = 'data ' . $key . ' kosong';
				$respon['error'] = TRUE;
				$respon['dataResponse'] = NULL;
				$this->response($respon, $code);
				break;
			}
		}

		$response = $this->Laundry_model->detail_laundry($id);

		$this->response($response["response"], $response["code"]);
	}	
}
