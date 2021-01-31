<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Checkout_model');
    }

    public function index()
    {
        $this->isLoggedIn();
        $this->load->templateUser('user/cart');
    }

    function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('produk_id'),
            'name' => $this->input->post('produk_nama'),
            'price' => $this->input->post('produk_harga'),
            'gambar' => $this->input->post('produk_gambar'),
            'qty' => $this->input->post('quantity'),
        );
        $id = $this->input->post('produk_id');
        $this->cart->insert ($data);
        $this->Checkout_model->KurangiStokBarang($this->input->post('produk_id'), $this->input->post('quantity'));
        $data['countItem'] = count($this->cart->contents()); //tampilkan cart setelah added
        $data['stok'] = $this->Checkout_model->jmhStok($id)->row_array();
        echo json_encode($data);
    }

    function hapus_cart(){ //fungsi untuk menghapus item cart
        $this->Checkout_model->TambahStokBarang($this->input->post('id_barang'), $this->input->post('quantity'));
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo count($this->cart->contents());
    }

    function hapusAllCart(){ //fungsi untuk menghapus item cart
        if ($cart = $this->cart->contents())
        {
            foreach ($cart as $item)
            {
                $this->Checkout_model->TambahStokBarang($item['id'], $item['qty']);
            }
        }
        $this->cart->destroy();
        $this->load->templateUser('user/cart');
    }

    function tambah(){
    }

}