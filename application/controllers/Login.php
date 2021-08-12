<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // if ($this->session->userdata('username')) {
        //     redirect('user');
        // }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->Mod_login->ceklogin();
        }
    }
}
