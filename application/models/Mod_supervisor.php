<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_supervisor extends CI_Model
{
    public function add()
    {
        $username = $this->input->post('username', true);

        // cek jika ada gambar yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = [
            'nama_user' => htmlspecialchars($this->input->post('name', true)),
            'username' => htmlspecialchars($username),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_telp' => htmlspecialchars($this->input->post('telp', true)),
            'image' => $upload_image,
            'role_id' => htmlspecialchars($this->input->post('posisi', true)),
            'is_active' => 1,
            'created_date' => time()
        ];

        $this->db->insert('tbl_user', $data);
        redirect('auth');
    }

    public function get($id = null)
    {
        $this->db->from('tbl_user');
        if ($id != null) {
            $this->db->where('email', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit($data)
    {
        $id = $this->input->post('id_user');
        $nama = $this->input->post('name');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $role_id = $this->input->post('posisi');

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
        $this->db->set('email', $email);
        $this->db->set('no_telp', $no_telp);
        $this->db->set('role_id', $role_id);
        $this->db->where('id_user', $id);
        $this->db->update('tbl_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui!</div>');
        redirect('Supervisor/infoPegawai');
    }

    public function getPegawai()
    {
        $keyword1 = 2;
        $keyword2 = 3;
        $this->db->like('role_id', $keyword1);
        $this->db->or_like('role_id', $keyword2);
        return $this->db->get('tbl_user')->result_array();
    }

    public function cariDataPegawai()
    {
        $keyword = $this->input->post('keywordPegawai', true);
        $this->db->like('id_user', $keyword);
        $this->db->or_like('nama_user', $keyword);
        return $this->db->get('tbl_user')->result_array();
    }

    public function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("tbl_user");
        if ($query != '') {
            $this->db->like('nama_user', $query);
            $this->db->or_like('email', $query);
        }
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get();
    }

    public function hapusPegawai($id)
    {
        $this->db->delete('tbl_user', ['id_user' => $id]);
    }
}
