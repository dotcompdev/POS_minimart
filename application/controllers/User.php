<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mod_user');
    }

    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editProfil()
    {
        $data['judul'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/editProfilV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_user->edit($data);
        }
    }

    public function gantiPassword()
    {
        $data['judul'] = 'Ganti Password';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('passwordSaatIni', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|trim|min_length[8]|matches[ulangiPassword]');
        $this->form_validation->set_rules('ulangiPassword', 'Ulangi Password', 'required|trim|min_length[8]|matches[passwordBaru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/gantiPasswordV');
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('passwordSaatIni');
            $new_password = $this->input->post('passwordBaru');
            if (!password_verify($current_password, $data['nama']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong current password!</div>');
                redirect('user/gantiPassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                  New password cannot be the same as current password!</div>');
                    redirect('user/gantiPassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tbl_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                  Password change!</div>');
                    redirect('user');
                }
            }
        }
    }
}
