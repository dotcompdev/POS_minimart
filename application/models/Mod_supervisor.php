<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_supervisor extends CI_Model
{
    public function add()
    {
        $username = $this->input->post('username', true);

        $data = [
            'nama_user' => htmlspecialchars($this->input->post('name', true)),
            'username' => htmlspecialchars($username),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_telp' => htmlspecialchars($this->input->post('telp', true)),
            'image' => 'default.jpg',
            'role_id' => htmlspecialchars($this->input->post('posisi', true)),
            'is_active' => 1,
            'created_date' => time()
        ];

        $this->db->insert('tbl_user', $data);
        redirect('auth');
    }
}
