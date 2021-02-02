<?php

class User_model extends MY_Model
{
    private $_table = 'tbl_user';
    function input_user($where)
    {
        $this->db->insert($this->_table, $where);
    }

    function register_user($data)
    {
        $data['id_user'] = $this->generateUUID();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $data['create_date'] = $this->getCurrentDateTime();

        $this->db->insert($this->_table, $data);

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

    public function login_user($dataRequest)
    {
        $this->db->where("email", $dataRequest["email"]);
        $currentData = $this->db->get($this->_table)->row();

        if ($currentData) {
            $isMatchPass = password_verify($dataRequest['password'], $currentData->password);

            if ($isMatchPass) {

                if ($currentData->status == 0) {
                    $code = 402;
                    $message = "Gagal Login";
                    $dataResponse = NULL;
                    $error["title"] = "User dinonaktifkan";
                    $error["message"] = "Mohon menghubungi Administrator untuk info lebih lanjut";
                    return $this->generateResponse($message, $dataResponse, $error, $code);
                } else {
                    $dataResponse = array(
                        "id_user" => $currentData->id_user,
                        "email" => $currentData->email,
                        "nama_lengkap" => $currentData->nama_lengkap,
                        "nomor_hp" => $currentData->nomor_hp,
                        "alamat" => $currentData->alamat,
                        "kota" => $currentData->kota,
                        "kecamatan" => $currentData->kecamatan,
                        "kelurahan" => $currentData->kelurahan,
                        "kode_pos" => $currentData->kode_pos,
                        "keterangan_alamat" => $currentData->keterangan_alamat,
                        "photo" => 'https://jrlifesciences.com/wp-content/uploads/2018/09/gravatar.jpg',
                    );
                    $code = 200;
                    $message = "Success Login";
                    $error = NULL;
                    return $this->generateResponse($message, $dataResponse, $error, $code);
                }
            } else {
                $code = 402;
                $message = "Gagal Login";
                $dataResponse = NULL;
                $error["title"] = "User tidak dapat login";
                $error["message"] = "Silahkan cek kembali username / password anda";
                return $this->generateResponse($message, $dataResponse, $error, $code);
            }
        } else {
            $code = 402;
            $message = "Gagal Login";
            $dataResponse = NULL;
            $error["title"] = "Email tidak ditemukan";
            $error["message"] = "Email Tidak Ditemukan";
            return $this->generateResponse($message, $dataResponse, $error, $code);
        }
    }

    function update_alamat_user($data)
    {
        $alamat = array(
            'alamat' => $data['alamat'],
            'kota' => $data['kota'],
            'kecamatan' => $data['kecamatan'],
            'kelurahan' => $data['kelurahan'],
            'kode_pos' => $data['kode_pos'],
            'keterangan_alamat' => $data['keterangan_alamat'],
            'update_date' => $this->getCurrentDateTime()
        );

        $this->db->where('id_user', $data['id_user']);
        $this->db->update($this->_table, $alamat);

        if (!$this->db->error()) {
            $code = 500;
            $message = "Gagal Memperbarui alamat user";
            $dataResponse = NULL;
            $error = TRUE;
        } else {
            $code = 201;
            $message = "Berhasil Memperbarui alamat user";
            $dataResponse = $data;
            $error = NULL;
        }
        return $this->generateResponse($message, $dataResponse, $error, $code);
    }

    function update_user($where, $data)
    {
        $this->db->where($where);
        $this->db->update('tbl_user', $data);
    }

    function hapusUser($where)
    {
        $this->db->where($where);
        $this->db->delete('tbl_user');
    }

    function checkUser($where)
    {
        $this->db->where($where);
        $query = $this->db->get("tbl_user");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function cek_login($where)
    {
        return $this->db->get_where('tbl_user', $where);
    }

    function daftarUser()
    {
        return $this->db->get('tbl_user');
    }
}
