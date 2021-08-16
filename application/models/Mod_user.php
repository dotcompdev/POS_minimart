<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_user extends CI_Model
{
    public function edit($data)
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');

        // cek jika ada gambar yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nama_user', $nama);
        $this->db->set('username', $username);
        $this->db->set('no_telp', $no_telp);
        $this->db->where('email', $email);
        $this->db->update('tbl_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been upadated!</div>');
        redirect('user');
    }
}
