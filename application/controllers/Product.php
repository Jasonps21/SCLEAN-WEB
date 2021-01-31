<?php

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index()
    {
        $data['daftarKategori'] = $this->Product_model->daftarKategori()->result();
        $data['daftarBarang'] = $this->Product_model->daftarBarang()->result();
        $this->load->templateUser('user/product', $data);
    }

    public function cari_produk()
    {
        $cari = $this->input->get('pencarian');
        $data['cari'] = $cari;
        $data['daftarKategori'] = $this->Product_model->daftarKategori()->result();
        $data['daftarBarang'] = $this->Product_model->daftarBarangbyPencarian($cari)->result();
        $this->load->templateUser('user/cari_product', $data);
    }

    public function kategori_produk($kategori)
    {
        $datakategori = $this->Product_model->detailKategori($kategori)->row_array();
        $data['cari'] = $datakategori['nama_kategori'];
        $data['daftarKategori'] = $this->Product_model->daftarKategori()->result();
        $data['daftarBarang'] = $this->Product_model->daftarBarangbyKategori($kategori)->result();
        $this->load->templateUser('user/kategori_product', $data);
    }


}