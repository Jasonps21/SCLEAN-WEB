<?php

use chriskacerguis\RestServer\RestController;
use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('User_model');
	}

	public function register_post()
	{
		$dataRequest = $this->input->post();

		$filter = array();
		$filter['nama_lengkap'] = $this->post('nama_lengkap');
		$filter['email'] = $this->post('email');
		$filter['password'] = $this->post('password');
		$filter['nomor_hp'] = $this->post('nomor_hp');		

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

		$response = $this->User_model->register_user($dataRequest);

		$this->response($response["response"], $response["code"]);
	}

	public function login_post()
	{
		$dataRequest = $this->input->post();

		$filter = array();
		$filter['email'] = $this->post('email');
		$filter['password'] = $this->post('password');		

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

		$response = $this->User_model->login_user($dataRequest);

		$this->response($response["response"], $response["code"]);
	}

	public function update_alamat_post()
	{
		$dataRequest = $this->input->post();

		$filter = array();
		$filter['id_user'] = $this->post('id_user');
		$filter['alamat'] = $this->post('alamat');
		$filter['kota'] = $this->post('kota');
		$filter['kecamatan'] = $this->post('kecamatan');
		$filter['kelurahan'] = $this->post('kelurahan');
		$filter['kode_pos'] = $this->post('kode_pos');
		$filter['keterangan_alamat'] = $this->post('keterangan_alamat');

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

		$response = $this->User_model->update_alamat_user($dataRequest);

		$this->response($response["response"], $response["code"]);
	}
}
