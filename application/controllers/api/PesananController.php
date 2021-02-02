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
	
	public function historyPesanan_get()
	{
		$id = $this->input->get('id_user');

		$filter = array();
		$filter['id'] = $this->get('id_user');		

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

		$response = $this->Checkout_model->daftar_pesanan_by_user($id);

		$this->response($response["response"], $response["code"]);
	}

	public function historyPesananDetail_get()
	{
		$id = $this->input->get('id_pesanan');

		$filter = array();
		$filter['id'] = $this->get('id_pesanan');		

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

		$response = $this->Checkout_model->detail_pesanan_by_user($id);

		$this->response($response["response"], $response["code"]);
	}

	public function batalkanPesanan_post()
	{
		$id = $this->input->get('id_pesanan');

		$filter = array();
		$filter['id_pesanan'] = $this->post('id_pesanan');		

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

		$response = $this->Checkout_model->cancel_checkout($id);

		$this->response($response["response"], $response["code"]);
	}
}
