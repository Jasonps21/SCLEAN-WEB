<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $isLoggedIn = $this->session->userdata('status');
        $id_pemilik =  $isLoggedIn === "Admin" ? 0 : $this->session->userdata('id');
        // $this->load->model('Laundry_model');
        $data['daftartransaksi'] = $this->Laporan_model->daftarLaporan($tgl_awal, $tgl_akhir, $id_pemilik)->result();
        // $data['daftarLaundry'] = $this->Laundry_model->daftarLaundry($id_pemilik)->result();
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
        $isLoggedIn = $this->session->userdata('status');
        $id_pemilik =  $isLoggedIn === "Admin" ? 0 : $this->session->userdata('id');
        $data['daftartransaksi'] = $this->Laporan_model->daftarLaporan($tgl_awal, $tgl_akhir, $id_pemilik)->result();
        $this->load->template('admin/laporanpenjualan', $data);
    }

    public function laporan_admin()
    {
        $tgl_awal = date("Y-m-d");
        $tgl_akhir = date("Y-m-d");
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['id_laundry'] = "";        
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Laporan Transaksi berdasarkan Laundry";
        $data['daftartransaksi'] = [];
        $this->load->model('Laundry_model');
        $data['daftarLaundry'] = $this->Laundry_model->daftarLaundry(0)->result();
        $this->load->template('admin/laporanpenjualanadmin', $data);
    }

    public function LaporanAdminByDate()
    {

        $tgl_awal = $this->input->post('startDate');
        $tgl_akhir = $this->input->post('endDate');
        $id_laundry = $this->input->post('id_laundry');
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Laporan Transaksi berdasarkan Laundry";
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['id_laundry'] = $id_laundry;        
        $this->load->model('Laundry_model');
        $data['daftarLaundry'] = $this->Laundry_model->daftarLaundry(0)->result();
        $data['daftartransaksi'] = $this->Laporan_model->daftarLaporanbyLaundry($tgl_awal, $tgl_akhir, $id_laundry)->result();
        $this->load->template('admin/laporanpenjualanadmin', $data);
    }
}
