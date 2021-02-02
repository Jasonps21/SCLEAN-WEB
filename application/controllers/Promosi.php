<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('EXT', '.' . pathinfo(__FILE__, PATHINFO_EXTENSION));
define('PUBPATH', str_replace(SELF, '', FCPATH)); // added

class Promosi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Promosi_model');
    }

    public function index()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Promosi";
        $data['daftarPromosi'] = $this->Promosi_model->daftarPromosi()->result();
        $this->load->template('admin/promosi', $data);
    }

    public function tambah_promosi()
    {
        $id = $this->uuid->v4();
        $keterangan = $this->input->post('keterangan');
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');        

        $config['upload_path'] = './assets/images/promosi';
        $config['allowed_types'] = 'jpg|png|bmp';
        $config['file_name'] = $id;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('error', 'Tidak Ada Foto Promosi Di Upload');
            redirect(base_url('Promosi'));
        } else {
            $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            $data = array(
                'id' => $id,
                'keterangan' => $keterangan,
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'photo' => $nama_gambar,                
                'create_date' => date('Y-m-d h:i:s')
            );

            $result = $this->Promosi_model->input_promosi($data);

            if ($result) {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect(base_url('Promosi'));
            } else {
                $this->session->set_flashdata('success', 'Promosi Berhasil Ditambahkan');
                redirect(base_url('Promosi'));
            }
        }
    }

    public function edit_promosi()
    {
        $id = $this->input->post('id_promosi');
        $keterangan = $this->input->post('keterangan');
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $gambar = $this->input->post('gambar_temp');

        if ($_FILES['gambar']['size'] == 0) {
            $data = array(
                'keterangan' => $keterangan,
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'update_date' => date('Y-m-d h:i:s')
            );
        } else {
            $config['upload_path'] = './assets/images/promosi';
            $config['allowed_types'] = 'jpg|png|bmp';
            $config['file_name'] = $id;

            $this->upload->initialize($config);

            $this->load->library('upload', $config);

            $path = PUBPATH . "/assets/images/promosi/" . $gambar;

            if (file_exists($path)) {
                @unlink($path);
            }

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            }

            $data = array(
                'keterangan' => $keterangan,
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'photo' => $nama_gambar,
                'update_date' => date('Y-m-d h:i:s')
            );
        }

        $where = array(
            'id' => $id,
        );

        $result = $this->Promosi_model->edit_promosi($where, $data);

        if ($result) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('Promosi'));
        } else {
            $this->session->set_flashdata('success', 'Promosi Berhasil Diupdate');
            redirect(base_url('Promosi'));
        }
    }

    public function hapus_promosi($id, $gambar)
    {
        $data = array(
            'id' => $id,
        );

        $result2 = $this->Promosi_model->hapus_promosi($data);
        unlink(PUBPATH . "/assets/images/promosi/" . $gambar);


        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect(base_url('Promosi'));
        } else {
            $this->session->set_flashdata('success', 'Promosi Berhasil Dihapus');
            redirect(base_url('Promosi'));
        }
    }
}
