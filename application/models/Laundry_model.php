<?php

class Laundry_model extends MY_Model
{

    #MODEL LAUNDRY
    function AutoNumbering()
    {
        $today = date('Ymd');
        $data = $this->db->query("SELECT MAX(id_laundry) AS last FROM tbl_laundry ")->row_array();
        $lastNo = $data['last'];
        $lastNoUrut   = substr($lastNo, 9, 3);
        $nextNoUrut   = $lastNoUrut + 1;
        $nextNo = $today . sprintf('%03s', $nextNoUrut);
        return $nextNo;
    }

    function insert_laundry($data)
    {
        $this->db->insert('tbl_laundry', $data);
    }

    function hapus_laundry($where)
    {
        $this->db->where($where);
        $this->db->delete('tbl_laundry');
    }

    function edit_laundry($where, $data)
    {
        $this->db->where($where);
        $this->db->update('tbl_laundry', $data);
    }

    function daftarLaundry()
    {
        $result = $this->db->query("SELECT * FROM `tbl_laundry`");
        return $result;
    }

    function daftarLayanan($id_layanan)
    {
        $result = $this->db->query("SELECT * FROM `tbl_layanan_laundry` where id_laundry = '$id_layanan'");
        return $result;
    }

    function daftarLaundrybyID($id_laundry)
    {
        $result = $this->db->query("SELECT * FROM `tbl_laundry` where `id_laundry` = '" . $id_laundry . "'");
        return $result;
    }

    #MODEL LAYANAN LAUNDRY
    function input_layanan($data)
    {
        $this->db->insert('tbl_layanan_laundry', $data);
    }

    function edit_layanan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_layanan_laundry', $data);
    }

    function hapus_layanan($where)
    {
        $this->db->where($where);
        $this->db->delete('tbl_layanan_laundry');
    }

    #MODEL UNTUK API
    function daftar_laundry_api()
    {
        $result = $this->db->query("SELECT * FROM `tbl_laundry`");

        $data = array();
        foreach ($result->result() as $a) {
            $a->photo = 'assets/images/produk/' . $a->photo;
            array_push($data, $a);
        }

        if (!$this->db->error()) {
            $code = 500;
            $message = "Gagal Registrasi";
            $dataResponse = NULL;
            $error = TRUE;
        } else {
            $code = 201;
            $message = "Berhasil Registrasi";
            $dataResponse = $data;
            $error = NULL;
        }
        return $this->generateResponse($message, $dataResponse, $error, $code);
    }

    function detail_laundry($id_laundry)
    {
        $result = $this->db->query("SELECT * FROM `tbl_laundry` where id_laundry = '$id_laundry'")->row_array();

        $daftar_layanan = $this->db->query("SELECT * FROM `tbl_layanan_laundry` where id_laundry = '$id_laundry'")->result();

        $result['daftar_layanan'] = $daftar_layanan;

        if (!$this->db->error()) {
            $code = 500;
            $message = "Gagal Registrasi";
            $dataResponse = NULL;
            $error = TRUE;
        } else {
            $code = 201;
            $message = "Berhasil Registrasi";
            $dataResponse = $result;
            $error = NULL;
        }
        return $this->generateResponse($message, $dataResponse, $error, $code);
    }
}
