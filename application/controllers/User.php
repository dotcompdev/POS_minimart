<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['judul'] = 'My Profile';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editProfil()
    {
        $data['judul'] = 'Edit Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/editProfilV');
        $this->load->view('templates/footer');
    }

    public function gantiPassword()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/gantiPasswordV');
        $this->load->view('templates/footer');
    }
}
