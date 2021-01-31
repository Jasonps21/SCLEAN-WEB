<?php

class Checkout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('Checkout_model');
    }

    public function index()
    {
        $this->isLoggedIn();
        $where = array(
            'id_user' => $this->session->userdata('id_user')
        );
        $data['detailuser'] = $this->User_model->cek_login($where)->row_array();
        $this->load->templateUser('user/checkout', $data);
    }

    /*
     * 1. Menunggu bukti pembayaran
     * 2. Menunggu Konfirmasi pembayaran
     * 3. Pembayaran diterima
     * 4. Pembayaran ditolak
     * 5.
     * */

    public function save_orderan()
    {
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");

        $id_pemesanan =  "IKF".$this->Checkout_model->AutoNumbering();

        $dataUser = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'nama_toko' => $this->input->post('nama_toko'),
            'kota' => $this->input->post('kota'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kode_pos' => $this->input->post('kode_pos'),
            'email' => $this->input->post('email'),
            'nomor_hp' => $this->input->post('nomor_hp')
        );

        $where = array(
            'id_user' => $this->session->userdata('id_user'),
        );

        $this->User_model->update_user($where, $dataUser);

        //-------------------------Input data order------------------------------
        $data_order = array(
            'id_pemesanan' => $id_pemesanan,
            'id_user' => $this->session->userdata('id_user'),
            'tgl_pesan' => date('Y-m-d H:m:s'),
            'total' => $this->cart->total(),
            'status' => "1",
            'catatan_order' => $this->input->post('catatan_order')
        );

        $this->Checkout_model->tambah_order($data_order);

        //-------------------------Input data detail order-----------------------
        if ($cart = $this->cart->contents())
        {
            foreach ($cart as $item)
            {
                $data_detail = array(
                    'id_pemesanan' =>$id_pemesanan,
                    'id_barang' => $item['id'],
                    'stok' => $item['qty'],
                    'harga' => $item['price'],
                    'total' => $item['subtotal']);

//                $this->Checkout_model->KurangiStokBarang($item['id'], $item['qty']);
                $this->Checkout_model->tambah_detail_order($data_detail);
            }
        }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        echo $id_pemesanan;
    }

    public function konfirmasi_pembayaran($id_pemesanan){
        $data['detailpemesanan'] = $this->Checkout_model->detail_pemesan($id_pemesanan)->row_array();
        $data['detailorder'] = $this->Checkout_model->detail_order_barang($id_pemesanan)->result();
        $this->load->templateUser('user/komfirmasipembayaran', $data);
    }

    function upload_struk(){
        //TIMEZONE
        date_default_timezone_set("Asia/Makassar");

        $id_pemesan = $this->input->post('id_pemesanan');

        $config['upload_path'] = './assets/images/struk';
        $config['allowed_types'] = 'jpg|png|bmp';
        $config['file_name'] = $id_pemesan;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('myPhoto')) {
            $this->session->set_flashdata('error', 'Tidak Ada Foto Struk Di Upload');
            redirect(base_url('Konfirmasi/'.$id_pemesan));
        } else {
            $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            $where = array(
                'id_pemesanan' => $id_pemesan
            );

            $data = array(
                'file' => $nama_gambar,
                'status' => "2",
                'tgl_bayar' => date('Y-m-d H:i:s'),
                'tgl_status' => date('Y-m-d H:i:s')
            );

            $result = $this->Checkout_model->update_order($where, $data);

            if(!$result){
                redirect(base_url("Thankyou"));
            }
        }
    }

    function thankyou(){
        $this->load->templateUser('user/thankyou');
    }

}