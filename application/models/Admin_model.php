<?php

class Admin_model extends CI_Model
{

    public function daftarAdmin()
    {
        return $this->db->get('tbl_admin');
    }

    function checkAdmin($where)
    {
        $this->db->where($where);
        $query = $this->db->get("tbl_admin");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function hapusAdmin($where)
    {
        $this->db->where($where);
        $this->db->delete('tbl_admin');
    }

    function edit_admin($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_admin', $data);
    }

    function start_login($id_admin)
    {
        $result = $this->db->query("UPDATE tbl_admin SET last_login = NOW() where id = '$id_admin'");
    }

    function last_logout($id_admin)
    {
        $result = $this->db->query("UPDATE tbl_admin SET last_logout = NOW() where id = '$id_admin'");
    }    

    function input_admin($where)
    {
        $this->db->insert('tbl_admin', $where);
    }

    function cek_login($where)
    {
        return $this->db->get_where('tbl_admin', $where);
    }
}
