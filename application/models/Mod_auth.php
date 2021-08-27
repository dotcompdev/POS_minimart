<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mod_auth extends CI_Model
{
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                // echo "berhasil";
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Datang!</div>');
                        redirect('supervisor');
                    } elseif ($user['role_id'] == 2) {
                        $this->session->set_flashdata('message', '<div class="alert alert-Success" role="alert">Selamat Datang!</div>');
                        redirect('kasir');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Datang!</div>');
                        redirect('gudang');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth');
        }
    }
}
