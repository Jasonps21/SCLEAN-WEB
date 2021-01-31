<?php

class Laporan_model extends CI_Model
{

    function daftarLaporan($tgl_awal, $tgl_akhir)
    {
        $result = $this->db->query("SELECT `tbl_pemesan`.`id_pemesanan`, `tbl_barang`.`nama_barang`, `tbl_pemesan_detail`.`stok`, `tbl_pemesan_detail`.`harga`, `tbl_pemesan_detail`.`total`, `tbl_user`.`nama`, `tbl_pemesan`.`tgl_pesan`, `tbl_pemesan`.`total`, `tbl_pemesan`.`tgl_bayar` FROM `tbl_pemesan` INNER JOIN `tbl_user` ON `tbl_user`.`id_user` = `tbl_pemesan`.`id_user` INNER JOIN `tbl_pemesan_detail` ON `tbl_pemesan_detail`.`id_pemesanan` = `tbl_pemesan`.`id_pemesanan` INNER JOIN `tbl_barang` ON `tbl_pemesan_detail`.`id_barang` = `tbl_barang`.`id_barang` WHERE `tbl_pemesan`.`status` = '3' AND `tbl_pemesan`.`tgl_pesan` >= '".$tgl_awal."' AND `tbl_pemesan`.`tgl_pesan` <= '".$tgl_akhir."'");
        return $result;
    }

}