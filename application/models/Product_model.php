<?php

class Product_model extends CI_Model
{
    public function daftarKategori(){
        return $this->db->get('tbl_kategori');
    }

    public function detailKategori($id){
        $this->db->where("id", $id);
        return $this->db->get('tbl_kategori');
    }

    function daftarBarang()
    {
        $result = $this->db->query("SELECT `tbl_barang`.`id_barang`, `tbl_barang`.`nama_barang`, `tbl_kategori`.`nama_kategori`, `tbl_barang`.`stok`, `tbl_barang`.`tgl_masuk`, `tbl_barang`.`harga`, `tbl_barang`.`deskripsi`, `tbl_barang`.`file` FROM `tbl_barang` INNER JOIN `tbl_kategori` ON `tbl_kategori`.`id` = `tbl_barang`.`id_kategori`");
        return $result;
    }

    function daftarBarangbyPencarian($cari)
    {
        $result = $this->db->query("SELECT `tbl_barang`.`id_barang`, `tbl_barang`.`nama_barang`, `tbl_kategori`.`nama_kategori`, `tbl_barang`.`stok`, `tbl_barang`.`tgl_masuk`, `tbl_barang`.`harga`, `tbl_barang`.`deskripsi`, `tbl_barang`.`file` FROM `tbl_barang` INNER JOIN `tbl_kategori` ON `tbl_kategori`.`id` = `tbl_barang`.`id_kategori` WHERE `tbl_barang`.`nama_barang` LIKE '%".$cari."%'");
        return $result;
    }

    function daftarBarangbyKategori($kategori)
    {
        $result = $this->db->query("SELECT `tbl_barang`.`id_barang`, `tbl_barang`.`nama_barang`, `tbl_kategori`.`nama_kategori`, `tbl_barang`.`stok`, `tbl_barang`.`tgl_masuk`, `tbl_barang`.`harga`, `tbl_barang`.`deskripsi`, `tbl_barang`.`file` FROM `tbl_barang` INNER JOIN `tbl_kategori` ON `tbl_kategori`.`id` = `tbl_barang`.`id_kategori` WHERE `tbl_barang`.`id_kategori` = '".$kategori."'");
        return $result;
    }

}