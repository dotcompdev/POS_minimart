<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/dashboardV');
        $this->load->view('templates/footer');
    }

    public function registration()
    {
        // cegah pindah halaman tanpa logout/in
        // if ($this->session->userdata('username')) {
        //     redirect('user');
        // }
    }
}
