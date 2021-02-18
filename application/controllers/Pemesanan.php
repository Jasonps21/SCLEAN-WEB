<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Checkout_model');
    }

    public function index()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Daftar Permintaan Layanan";
        $isLoggedIn = $this->session->userdata('status');
        $id_pemilik =  $isLoggedIn === "Admin" ? 0 : $this->session->userdata('id');
        $data['daftarPemesan'] = $this->Checkout_model->daftar_pemesan($id_pemilik)->result();
        $this->load->template('admin/pemesananlayanan', $data);
    }

    function update_status($id_pemesan, $status)
    {
        date_default_timezone_set('Asia/makassar');
        $this->isLoggedAdminIn();
        $where = array(
            'id_pesanan' => $id_pemesan
        );

        if ($status === '1') {
            $dataorder = array(
                'status' => $status,
                'tgl_konfirmasi' => date('Y-m-d H:i:s'),
                'tgl_status' => date('Y-m-d H:i:s')
            );
        } elseif ($status === '2') {
            $dataorder = array(
                'status' => $status,
                'tgl_selesai' => date('Y-m-d H:i:s'),
                'tgl_status' => date('Y-m-d H:i:s')
            );
        } elseif ($status === '3' ) {
            $dataorder = array(
                'status' => $status,
                'tgl_status' => date('Y-m-d H:i:s')
            );
        }

        $result = $this->Checkout_model->update_order($where, $dataorder);
        redirect(base_url("Pemesanan"));
    }

    function batalOrderan($id_pemesan)
    {
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

    function setujuOrderan($id_pemesan)
    {
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

    function detail_pesanan($id_pemesanan, $no_invoice)
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Detail Pemesanan #" . $no_invoice;
        $data['detailpemesanan'] = $this->Checkout_model->detail_pemesan($id_pemesanan)->row_array();
        $data['detailorder'] = $this->Checkout_model->detail_pesanan_layanan($id_pemesanan)->result();
        $this->load->template('admin/detailorderan', $data);
    }

    function daftarPesanan()
    {
        $this->isLoggedIn();
        $where = $this->session->userdata('id_user');
        $data['daftarpemesanan'] = $this->Checkout_model->daftar_pemesan_by_user($where)->result();
        $this->load->templateUser('user/daftarpesanan', $data);
    }
}
