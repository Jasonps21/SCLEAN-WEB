<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
    }

    public function index()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Admin";
        $data['daftarAdmin'] = $this->Admin_model->daftarAdmin()->result();
        $this->load->template('admin/admin', $data);
    }

    public function tambah_admin()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $status = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => md5($password),
            'status' => $status
        );

        $where = array(
            'email' => $email,
        );

        $result = $this->Admin_model->checkAdmin($where);

        if ($result) {
            echo $this->session->set_flashdata('error', 'Email telah ada tersimpan');
            redirect(base_url('Admin'));
        } else {
            $result2 = $this->Admin_model->input_admin($data);

            if ($result2) {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect(base_url('Admin'));
            } else {
                $this->session->set_flashdata('success', 'Admin Berhasil Ditambahkan');
                redirect(base_url('Admin'));
            }
        }
    }

    public function edit_admin()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $status = $this->input->post('status');

        if ($password == null) {
            $data = array(
                'nama' => $nama,
                'status' => $status
            );
        } else {
            $data = array(
                'nama' => $nama,
                'password' => md5($password),
                'status' => $status
            );
        }


        $result2 = $this->Admin_model->edit_admin($id, $data);

        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
            redirect(base_url('Admin'));
        } else {
            $this->session->set_flashdata('success', 'Admin Berhasil Diupdate');
            redirect(base_url('Admin'));
        }
    }

    public function hapus_admin($id)
    {
        $data = array(
            'id' => $id,
        );

        $result2 = $this->Admin_model->hapusAdmin($data);


        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect(base_url('Admin'));
        } else {
            $this->session->set_flashdata('success', 'Admin Berhasil Dihapus');
            redirect(base_url('Admin'));
        }
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function aksi_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email == null || $password == null) {
            $this->session->set_flashdata('error', 'Email atau password belum diisi !');
            redirect(base_url('Admin/login'));
        } else {
            $where = array(
                'email' => $email,
                'password' => md5($password)
            );
            $cek = $this->Admin_model->cek_login($where)->num_rows();
            if ($cek > 0) {

                $result = $this->Admin_model->cek_login($where)->result();

                $data_session = array(
                    'status' => $result[0]->status,
                    'id' => $result[0]->id,
                    'nama_admin' => $result[0]->nama,
                    'email' => $result[0]->email
                );            
                $this->Admin_model->start_login($result[0]->id);

                $this->session->set_userdata($data_session);

                redirect(base_url("Dashboard"));
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah !');
                redirect(base_url('Admin/login'));
            }
        }
    }

    function logout()
    {
        $this->Admin_model->last_logout($this->session->userdata('id'));
        $this->session->sess_destroy();
        redirect(base_url("admin/login"));
    }

    function access_denied()
    {
        $this->load->view('admin/403');
    }
}
