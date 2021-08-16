<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mod_supervisor');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Supervisor";
        $data['user'] = $this->Mod_supervisor->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/dashboardV', $data);
        $this->load->view('templates/footer');
    }
    public function registration()
    {
        // cegah pindah halaman tanpa logout/in
        // if ($this->session->userdata('username')) {
        //     redirect('user');
        // }

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('image', 'Image', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tambah Akun";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('supervisor/pegawai/registrationV');
            $this->load->view('templates/footer');
        } else {
            $this->Mod_supervisor->add();
        }
    }
    public function infoPegawai()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pegawai/infoPegawai');
        $this->load->view('templates/footer');
    }

    public function tambahPegawai()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pegawai/tambahPegawai');
        $this->load->view('templates/footer');
    }
}
