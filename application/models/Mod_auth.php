<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_auth extends CI_Model
{
    public function ceklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        // cek user ada?
        if ($user) {
            // cek user aktif?
            if ($user['is_active'] == 1) {
                // echo "berhasil";
                // cek password
                if (password_verify($password, $user['password'])) {
                    // echo "berhasil";
                    $data = [
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    // data tersimpan di session
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('supervisor');
                    } elseif ($user['role_id'] == 2) {
                        redirect('supervisor');
                    } else {
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
