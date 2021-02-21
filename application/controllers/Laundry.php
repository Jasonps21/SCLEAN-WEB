<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('EXT', '.' . pathinfo(__FILE__, PATHINFO_EXTENSION));
define('PUBPATH', str_replace(SELF, '', FCPATH)); // added

class Laundry extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Laundry_model');
    }

    public function index()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Laundry";
        $isLoggedIn = $this->session->userdata('status');
        $id_pemilik =  $isLoggedIn === "Admin" ? 0 : $this->session->userdata('id');                
        $data['daftarLaundry'] = $this->Laundry_model->daftarLaundry($id_pemilik)->result();
        $this->load->template('admin/laundry', $data);
    }

    public function tambah_laundry()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Tambah Laundry";
        $this->load->template('admin/tambah_laundry', $data);
    }

    public function daftar_layanan($id_laundry)
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Daftar Layanan";        
        $data['daftarLayanan'] = $this->Laundry_model->daftarLayanan($id_laundry)->result();
        $this->load->template('admin/layanan_laundry', $data);
    }

    public function edit_laundry($id_laundry)
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Edit Laundry";
        $data['detailLaundry'] = $this->Laundry_model->daftarLaundrybyID($id_laundry)->row_array();
        $this->load->template('admin/edit_laundry', $data);
    }

    public function input_laundry()
    {
        $id_laundry = $this->uuid->v4();
        $nama_laundry = $this->input->post('nama_laundry');
        $nomor_telepon = $this->input->post('nomor_telepon');
        $jam_buka = $this->input->post('jam_buka');
        $jam_tutup = $this->input->post('jam_tutup');
        $alamat = $this->input->post('alamat');
        $biaya_pengantaran = $this->input->post('biaya_pengantaran');
        $deskripsi = $this->input->post('deskripsi');
        $id_pemilik = $this->session->userdata('id');

        $config['upload_path'] = './assets/images/produk';
        $config['allowed_types'] = 'jpg|png|bmp';
        $config['file_name'] = $id_laundry;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('myPhoto')) {
            $this->session->set_flashdata('error', 'Tidak Ada Foto Laundry Di Upload');
            redirect(base_url('Laundry/tambah_laundry'));
        } else {
            $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            $data = array(
                'id_laundry' => $id_laundry,
                'nama_laundry' => $nama_laundry,
                'jam_buka' => $jam_buka,
                'jam_tutup' => $jam_tutup,
                'nomor_telepon' => $nomor_telepon,
                'alamat' => $alamat,
                'biaya_pengantaran' => $biaya_pengantaran,
                'deskripsi' => $deskripsi,
                'photo' => $nama_gambar,
                'id_pemilik' => $id_pemilik,
                'create_date' => date('Y-m-d h:i:s')
            );

            $result = $this->Laundry_model->insert_laundry($data);

            if ($result) {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect(base_url('Laundry'));
            } else {
                $this->session->set_flashdata('success', 'Laundry Berhasil Ditambahkan');
                redirect(base_url('Laundry'));
            }
        }
    }

    public function aksi_edit_laundry()
    {
        $id_laundry = $this->input->post('id_laundry');
        $nama_laundry = $this->input->post('nama_laundry');
        $nomor_telepon = $this->input->post('nomor_telepon');
        $jam_buka = $this->input->post('jam_buka');
        $jam_tutup = $this->input->post('jam_tutup');
        $alamat = $this->input->post('alamat');
        $biaya_pengantaran = $this->input->post('biaya_pengantaran');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $this->input->post('gambar');
        $id_pemilik = $this->session->userdata('id');

        if ($_FILES['myPhoto']['size'] == 0) {
            $data = array(
                'nama_laundry' => $nama_laundry,
                'jam_buka' => $jam_buka,
                'jam_tutup' => $jam_tutup,
                'nomor_telepon' => $nomor_telepon,
                'alamat' => $alamat,
                'biaya_pengantaran' => $biaya_pengantaran,
                'deskripsi' => $deskripsi,
                'id_pemilik' => $id_pemilik,
                'update_date' => date('Y-m-d h:i:s')
            );
        } else {
            $config['upload_path'] = './assets/images/produk';
            $config['allowed_types'] = 'jpg|png|bmp';
            $config['file_name'] = $id_laundry;

            $this->upload->initialize($config);

            $this->load->library('upload', $config);

            $path = PUBPATH . "/assets/images/produk/" . $gambar;

            if (file_exists($path)) {
                @unlink($path);
            }

            if (!$this->upload->do_upload('myPhoto')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $nama_gambar = $config['file_name'] . $this->upload->data('file_ext');
            }

            $data = array(
                'nama_laundry' => $nama_laundry,
                'jam_buka' => $jam_buka,
                'jam_tutup' => $jam_tutup,
                'nomor_telepon' => $nomor_telepon,
                'alamat' => $alamat,
                'deskripsi' => $deskripsi,
                'photo' => $nama_gambar,
                'update_date' => date('Y-m-d h:i:s')
            );
        }

        $where = array(
            'id_laundry' => $id_laundry,
        );

        $result = $this->Laundry_model->edit_laundry($where, $data);

        if ($result) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('Laundry'));
        } else {
            $this->session->set_flashdata('success', 'Laundry Berhasil Diupdate');
            redirect(base_url('Laundry'));
        }
    }

    public function laundry_set_recommend($id_laundry)
    {
                    
        $result = $this->Laundry_model->set_recommend($id_laundry);

        if (!$result) {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
            redirect(base_url('Laundry'));
        } else {
            $this->session->set_flashdata('success', 'Laundry Berhasil set rekomendasi');
            redirect(base_url('Laundry'));
        }
    }

    public function hapus_laundry($id, $gambar)
    {
        $data = array(
            'id_laundry' => $id,
        );

        $result2 = $this->Laundry_model->hapus_laundry($data);
        unlink(PUBPATH . "/assets/images/produk/" . $gambar);


        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect(base_url('Laundry'));
        } else {
            $this->session->set_flashdata('success', 'Laundry Berhasil Dihapus');
            redirect(base_url('Laundry'));
        }
    }

    public function tambah_layanan()
    {
        $id_laundry = $this->input->post('id_laundry');
        $nama_layanan = $this->input->post('nama_layanan');
        $estimasi = $this->input->post('estimasi');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');

        $data = array(
            'id' => $this->uuid->v4(),
            'id_laundry' => $id_laundry,
            'nama_layanan' => $nama_layanan,
            'estimasi' => $estimasi,
            'harga' => $harga,
            'satuan' => $satuan,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $result2 = $this->Laundry_model->input_layanan($data);

        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('Laundry/daftar_layanan/' . $id_laundry));
        } else {
            $this->session->set_flashdata('success', 'Layanan Laundry Berhasil Ditambahkan');
            redirect(base_url('Laundry/daftar_layanan/' . $id_laundry));
        }
    }

    public function edit_layanan()
    {
        $id_laundry = $this->input->post('id_laundry');
        $id_layanan = $this->input->post('id_layanan');
        $nama_layanan = $this->input->post('nama_layanan');
        $estimasi = $this->input->post('estimasi');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');

        $data = array(
            'nama_layanan' => $nama_layanan,
            'estimasi' => $estimasi,
            'harga' => $harga,
            'satuan' => $satuan,
            'update_date' => date('Y-m-d h:i:s'),
        );


        $result2 = $this->Laundry_model->edit_layanan($id_layanan, $data);

        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
            redirect(base_url('Laundry/daftar_layanan/' . $id_laundry));
        } else {
            $this->session->set_flashdata('success', 'Kategori Berhasil Diupdate');
            redirect(base_url('Laundry/daftar_layanan/' . $id_laundry));
        }
    }

    public function hapus_layanan($id, $id_laundry)
    {
        $data = array(
            'id' => $id,
        );

        $result2 = $this->Laundry_model->hapus_layanan($data);


        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect(base_url('Laundry/daftar_layanan/' . $id_laundry));
        } else {
            $this->session->set_flashdata('success', 'Layanan Laundry Berhasil Dihapus');
            redirect(base_url('Laundry/daftar_layanan/' . $id_laundry));
        }
    }
}
