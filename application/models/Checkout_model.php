<?php

class Checkout_model extends MY_Model
{    
    function AutoNumbering()
    {
        $today = date('Ymd');
        $data = $this->db->query("SELECT MAX(nomor_pesanan) AS last FROM tbl_pemesan ")->row_array();
        $lastNo = $data['last'];
        $lastNoUrut   = substr($lastNo, 11, 3);
        $nextNoUrut   = $lastNoUrut + 1;
        $nextNo = $today . sprintf('%03s', $nextNoUrut);
        return $nextNo;
    }

    function tambah_order($data)
    {
        $this->db->insert('tbl_pemesan', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    function tambah_detail_order($data)
    {
        $this->db->insert('tbl_pemesan_detail', $data);
    }

    function update_order($where, $data)
    {
        $this->db->where($where);
        $this->db->update('tbl_pemesan', $data);
    }

    function opsi_order($where, $data)
    {
        $this->db->where($where);
        $this->db->update('tbl_pemesan', $data);
    }

    function detail_pemesan($id_pemesanan)
    {
        return $this->db->query("SELECT `tbl_pemesan`.`id_pemesanan`, `tbl_pemesan`.`tgl_pesan`, `tbl_pemesan`.`total`, `tbl_pemesan`.`catatan_order`, `tbl_pemesan`.`status`, `tbl_pemesan`.`tgl_bayar`, `tbl_pemesan`.`catatan_order`, `tbl_user`.`id_user`, `tbl_user`.`nama`, `tbl_user`.`email`, `tbl_user`.`nomor_hp`, `tbl_user`.`alamat`, `tbl_user`.`kota`, `tbl_user`.`kecamatan`, `tbl_user`.`kelurahan`, `tbl_user`.`kode_pos`, `tbl_user`.`nama_toko` FROM `tbl_pemesan` INNER JOIN `tbl_user` ON `tbl_user`.`id_user` = `tbl_pemesan`.`id_user` WHERE `tbl_pemesan`.`id_pemesanan` = '" . $id_pemesanan . "'");
    }

    function jmhStok($id_barang)
    {
        return $this->db->query("SELECT `stok` FROM `tbl_barang` WHERE id_barang = '" . $id_barang . "'");
    }

    function daftar_pemesan()
    {
        return $this->db->query("SELECT p.id_pesanan, p.nomor_pesanan, u.nama_lengkap, u.alamat, u.kota, u.kecamatan, u.kelurahan, u.kode_pos, l.nama_laundry, p.tgl_pesan, p.total, p.`status` FROM `tbl_pemesan` p INNER JOIN tbl_laundry l ON l.id_laundry = p.id_laundry INNER JOIN tbl_user u ON u.id_user = p.id_user");
    }

    function daftar_pemesan_by_user($where)
    {
        return $this->db->query("SELECT `tbl_pemesan`.`id_pemesanan`, `tbl_pemesan`.`tgl_pesan`, `tbl_pemesan`.`tgl_bayar`,`tbl_pemesan`.`status`, `tbl_pemesan`.`file`, `tbl_pemesan`.`total`, `tbl_user`.`id_user`, `tbl_user`.`nama`, `tbl_user`.`email`, `tbl_user`.`nomor_hp`, `tbl_user`.`alamat`, `tbl_user`.`kota`, `tbl_user`.`kecamatan`, `tbl_user`.`kelurahan`, `tbl_user`.`kode_pos`, `tbl_user`.`nama_toko` FROM `tbl_pemesan` INNER JOIN `tbl_user` ON `tbl_user`.`id_user` = `tbl_pemesan`.`id_user` where `tbl_pemesan`.`id_user`='" . $where . "'order by `tbl_pemesan`.`tgl_pesan` DESC ");
    }

    function detail_order_barang($id_pemesanan)
    {
        return $this->db->query("SELECT `tbl_pemesan_detail`.`id_pemesanan`, `tbl_pemesan_detail`.`id_barang`,`tbl_pemesan_detail`.`stok`, `tbl_pemesan_detail`.`harga`, `tbl_pemesan_detail`.`total`, `tbl_barang`.`nama_barang` FROM `tbl_pemesan_detail` INNER JOIN `tbl_barang` ON `tbl_barang`.`id_barang` = `tbl_pemesan_detail`.`id_barang` WHERE `tbl_pemesan_detail`.`id_pemesanan` =  '" . $id_pemesanan . "'");
    }

    #UNTUK MODEL API
    public function input_checkout($dataRequest)
    {

        if ($dataRequest['id_user'] <> NULL or $dataRequest['id_user'] === '') {
            if ($dataRequest['id_laundry'] <> NULL or $dataRequest['id_laundry'] === '') {

                $id_pemesanan = $this->uuid->v4();

                $total = 0;
                foreach (json_decode($dataRequest['daftar_layanan']) as $each_layanan) {
                    $data = array(
                        'id_pemesanan' => $id_pemesanan,
                        'id_layanan' => $each_layanan->id_layanan,
                        'qty' => $each_layanan->qty,
                        'harga' => $each_layanan->harga,
                        'total' => $each_layanan->qty * $each_layanan->harga,
                    );

                    $this->db->insert('tbl_pemesan_detail', $data);
                    $total += $each_layanan->qty * $each_layanan->harga;
                }

                $data_pemesan = array(
                    'id_pesanan' => $id_pemesanan,
                    'nomor_pesanan' => 'INV-' . $this->AutoNumbering(),
                    'id_user' => $dataRequest['id_user'],
                    'id_laundry' => $dataRequest['id_laundry'],
                    'tgl_pesan' => date('Y-m-d h:i:s'),
                    'total' => $total
                );
                $this->db->insert('tbl_pemesan', $data_pemesan);

                if (!$this->db->error()) {
                    $code = 500;
                    $message = "Gagal Menginput pesanan";
                    $dataResponse = NULL;
                    $error = TRUE;
                } else {
                    $code = 201;
                    $message = "Berhasil Menginput data pesanan";
                    $dataResponse = [];
                    $error = NULL;
                }

                return $this->generateResponse($message, $dataResponse, $error, $code);
            } else {
                $code = 402;
                $message = "Id Laundry tidak terisi / kosong";
                $dataResponse = NULL;
                $error["title"] = "Id Laundry Kosong";
                $error["message"] = "Id Laundry kosong, mohon untuk diinput terlebih dahulu";
                return $this->generateResponse($message, $dataResponse, $error, $code);
            }
        } else {
            $code = 402;
            $message = "Id User tidak terisi / kosong";
            $dataResponse = NULL;
            $error["title"] = "Id User Kosong";
            $error["message"] = "Id user kosong, mohon untuk diinput terlebih dahulu";
            return $this->generateResponse($message, $dataResponse, $error, $code);
        }
    }

    function daftar_pesanan_by_user($id_user)
    {
        $result = $this->db->query("SELECT p.*, l.nama_laundry, l.alamat, l.jam_buka, l.jam_tutup, l.nomor_telepon FROM `tbl_pemesan` p INNER JOIN tbl_laundry l ON l.id_laundry = p.id_laundry  WHERE p.id_user = '$id_user'")->result();

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

    function detail_pesanan_by_user($id_pemesanan)
    {
        $detail_pesanan  = $this->db->query("SELECT * FROM tbl_pemesan WHERE id_pesanan = '$id_pemesanan'")->row_array();

        $daftar_layanan  = $this->db->query("SELECT pd.*, ll.nama_layanan, ll.satuan FROM tbl_pemesan_detail pd INNER JOIN tbl_pemesan p ON p.id_pesanan = pd.id_pemesanan INNER JOIN tbl_layanan_laundry ll ON ll.id = pd.id_layanan WHERE pd.id_pemesanan = '$id_pemesanan'")->result();

        $detail_pesanan['daftar_layanan'] = $daftar_layanan;

        if (!$this->db->error()) {
            $code = 500;
            $message = "Gagal Registrasi";
            $dataResponse = NULL;
            $error = TRUE;
        } else {
            $code = 201;
            $message = "Berhasil Registrasi";
            $dataResponse = $detail_pesanan;
            $error = NULL;
        }
        return $this->generateResponse($message, $dataResponse, $error, $code);
    }

    function cancel_checkout($where)
    {        
        date_default_timezone_set('Asia/makassar');
        $this->db->where('id_pesanan', $where);
        $this->db->set('status', 3);
        
        $this->db->set('tgl_status', date('Y-m-d h:i:s'));
        $this->db->update('tbl_pemesan');

        if (!$this->db->error()) {
            $code = 500;
            $message = "Gagal Batalkan Pesanan";
            $dataResponse = NULL;
            $error = TRUE;
        } else {
            $code = 201;
            $message = "Berhasil Batalkan Pesanan";
            $dataResponse = NULL;
            $error = NULL;
        }
        return $this->generateResponse($message, $dataResponse, $error, $code);
    }
}
