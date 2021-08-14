<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Supervisor";
        $this->load->view('templates/header', $data);
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

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tambah Akun";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('supervisor/pegawai/registrationV');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'username' => htmlspecialchars($username),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'created_date' => time()

            ];
        }
    }
}
