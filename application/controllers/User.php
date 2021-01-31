<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->isLoggedIn();
        $where = array(
            'id_user' => $this->session->userdata('id_user')
        );
        $data['detailuser'] = $this->User_model->cek_login($where)->row_array();
        $this->load->templateUser('user/detail_user', $data);
    }

    public function pengguna()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Pengguna";
        $data['daftarUser'] = $this->User_model->daftarUser()->result();
        $this->load->template('admin/pengguna', $data);
    }

    public function login()
    {
        $this->load->view('user/login');
    }

    public function register()
    {
        $this->load->view('user/register');
    }

    public function aksi_register()
    {
        $nama = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $email = $this->input->post('email_user');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $nomor_hp = $this->input->post('nomor_hp');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'password' => md5($password),
            'nomor_hp' => $nomor_hp,
            'status' => "User"
        );

        $where = array(
            'email' => $email,
        );

        if ($password != $password2) {
            echo $this->session->set_flashdata('error', 'Password yang dimasukkan tidak sama');
            redirect(base_url('register'));
        } else {
            $result = $this->User_model->checkUser($where);

            if ($result) {
                echo $this->session->set_flashdata('error', 'Email telah digunakan');
                redirect(base_url('register'));
            } else {
                $result2 = $this->User_model->input_user($data);

                if ($result2) {
                    $this->session->set_flashdata('error', 'Data gagal disimpan');
                    redirect(base_url('login'));
                } else {
                    $this->session->set_flashdata('success', 'User Berhasil Dibuat');
                    redirect(base_url('login'));
                }
            }
        }
    }

    public function aksi_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email == null || $password == null) {
            $this->session->set_flashdata('error', 'Email atau password belum diisi !');
            redirect(base_url('login'));
        } else {
            $where = array(
                'email' => $email,
                'password' => md5($password)
            );
            $cek = $this->User_model->cek_login($where)->num_rows();
            if ($cek > 0) {

                $result = $this->User_model->cek_login($where)->result();

                $data_session = array(
                    'status_user' => $result[0]->status,
                    'id_user' => $result[0]->id_user,
                    'nama_user' => $result[0]->nama,
                    'email_user' => $result[0]->email
                );

                print_r($data_session);

                $this->session->set_userdata($data_session);

                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah !');
                redirect(base_url('login'));
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function update_user()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $nomor_hp = $this->input->post('nomor_hp');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kode_pos = $this->input->post('kode_pos');


        $data = array(
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'nomor_hp' => $nomor_hp,
            'alamat' => $alamat,
            'kota' => $kota,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'kode_pos' => $kode_pos,
        );

        $where = array(
            'id_user' => $this->session->userdata('id_user'),
        );


        $result2 = $this->User_model->update_user($where, $data);

        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('User'));
        } else {
            $this->session->set_flashdata('success', 'User Berhasil Diupdate');
            redirect(base_url('User'));
        }
    }

    public function hapus_pengguna($id)
    {
        $data = array(
            'id_user' => $id,
        );

        $result2 = $this->User_model->hapusUser($data);


        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect(base_url('Pengguna'));
        } else {
            $this->session->set_flashdata('success', 'User Berhasil Dihapus');
            redirect(base_url('Pengguna'));
        }

    }

}
