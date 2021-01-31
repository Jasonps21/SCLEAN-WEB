<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $tgl_awal = date("Y-m-d");
        $tgl_akhir = date("Y-m-d");
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Laporan Transaksi";
        $data['daftartransaksi'] = $this->Laporan_model->daftarLaporan($tgl_awal, $tgl_akhir)->result();
        $this->load->template('admin/laporanpenjualan', $data);
    }

    public function LaporanByDate()
    {

        $tgl_awal = $this->input->post('startDate');
        $tgl_akhir = $this->input->post('endDate');
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Laporan Transaksi";
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['daftartransaksi'] = $this->Laporan_model->daftarLaporan($tgl_awal, $tgl_akhir)->result();
        $this->load->template('admin/laporanpenjualan', $data);
    }

}