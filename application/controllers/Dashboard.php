<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $this->isLoggedAdminIn();
        $data['pagetitle'] = "Dashboard";
        $this->load->template('admin/dashboard', $data);
    }
}
