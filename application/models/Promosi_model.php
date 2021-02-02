<?php

class Promosi_model extends MY_Model
{
    private $_table = 'tbl_promosi';
    function input_promosi($data)
    {
        $this->db->insert($this->_table, $data);
    }

    function edit_promosi($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->_table, $data);
    }

    function hapus_promosi($where)
    {
        $this->db->where($where);
        $this->db->delete($this->_table);
    }

    function daftarPromosi()
    {
        return $this->db->get($this->_table);
    }

    function daftar_promosi_api()
    {
        $result = $this->db->query("SELECT * FROM `tbl_promosi` WHERE '" . date('Y-m-d') . "' BETWEEN tgl_awal and tgl_akhir")->result();

        $data = array();
        foreach ($result as $a) {
            $a->photo = 'assets/images/promosi/' . $a->photo;
            array_push($data, $a);
        }

        if (!$this->db->error()) {
            $code = 500;
            $message = "Gagal Dapatkan data";
            $dataResponse = NULL;
            $error = TRUE;
        } else {
            $code = 201;
            $message = "Berhasil Ditampilkan";
            $dataResponse = $data;
            $error = NULL;
        }
        return $this->generateResponse($message, $dataResponse, $error, $code);
    }
}
