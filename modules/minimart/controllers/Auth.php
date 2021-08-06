<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('username')) {
            redirect('minimart/user');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('minimart/templates/auth_header');
            $this->load->view('minimart/auth/loginV');
            $this->load->view('minimart/templates/auth_footer');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        // user ada
        if ($user) {
            // user aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    // cek role
                    if ($user['role_id'] == 1) {
                        redirect('minimart/supervisor');
                    } elseif($user['role_id'] == 2) {
                        redirect('minimart/kasir');
                    } else {
                        redirect('minimart/stafGudang');
                    } 
                        
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('minimart/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email ini belum diaktifkan!
                </div>');
                redirect('minimart/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!
            </div>');
            redirect('minimart/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah logout!
        </div>');
        redirect('administrator/auth');
    }

}