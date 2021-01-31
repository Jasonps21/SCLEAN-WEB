<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Checkout_model');
    }

    public function index()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Daftar Permintaan Layanan";
        // $data['daftarPemesan'] = $this->Checkout_model->daftar_pemesan()->result();
        $this->load->template('admin/pemesananlayanan', $data);
    }

    function batalOrderan($id_pemesan){
        $this->isLoggedAdminIn();
        $where = array(
            'id_pemesanan' => $id_pemesan
        );

        $dataorder = array(
            'status' => "4",
            'tgl_status' => date('Y-m-d H:i:s')
        );

        $data['detailorder'] = $this->Checkout_model->detail_order_barang($id_pemesan)->result();

        foreach ($data['detailorder'] as $u) {

            $this->Checkout_model->TambahStokBarang($u->id_barang, $u->stok);

        }

        $result = $this->Checkout_model->opsi_order($where, $dataorder);
        redirect(base_url("Pemesanan"));
    }

    function setujuOrderan($id_pemesan){
        $this->isLoggedAdminIn();
        $where = array(
            'id_pemesanan' => $id_pemesan
        );

        $data = array(
            'status' => "3",
            'tgl_status' => date('Y-m-d H:i:s')
        );

        $result = $this->Checkout_model->opsi_order($where, $data);
        redirect(base_url("Pemesanan"));
    }

    function detailOrderan($id_pemesanan){
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Detail Pemesanan #".$id_pemesanan;
        $data['detailpemesanan'] = $this->Checkout_model->detail_pemesan($id_pemesanan)->row_array();
        $data['detailorder'] = $this->Checkout_model->detail_order_barang($id_pemesanan)->result();
        $this->load->template('admin/detailorderan', $data);
    }

    function daftarPesanan(){
        $this->isLoggedIn();
        $where = $this->session->userdata('id_user');
        $data['daftarpemesanan'] = $this->Checkout_model->daftar_pemesan_by_user($where)->result();
        $this->load->templateUser('user/daftarpesanan', $data);
    }

}