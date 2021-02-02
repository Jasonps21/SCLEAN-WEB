<?php

class Laporan_model extends CI_Model
{

    function daftarLaporan($tgl_awal, $tgl_akhir)
    {
        $result = $this->db->query("SELECT p.nomor_pesanan, p.tgl_pesan, l.nama_laundry, ll.nama_layanan, pd.qty, ll.satuan, pd.harga, pd.total FROM tbl_pemesan_detail pd INNER JOIN tbl_pemesan p ON p.id_pesanan = pd.id_pemesanan INNER JOIN tbl_laundry l ON l.id_laundry = p.id_laundry INNER JOIN tbl_layanan_laundry ll ON ll.id = pd.id_layanan WHERE p.tgl_pesan BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        return $result;
    }

}