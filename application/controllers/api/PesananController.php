<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class PesananController extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('Checkout_model');
	}	

    public function inputCheckout_post()    
	{
		$dataRequest = $this->input->post();
		
		$filter = array();
		$filter['id_user'] = $this->post('id_user');
		$filter['id_laundry'] = $this->post('id_laundry');
		$filter['daftar_layanan'] = $this->post('daftar_layanan');		

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

        $response = $this->Checkout_model->input_checkout($dataRequest);

		$this->response($response["response"], $response["code"]);
    }    
}
