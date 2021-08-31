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

    public function getSupplier($id = null)
    {
        $this->db->from('tbl_supplier');
        $query = $this->db->get();
        return $query;
    }

    public function edit($data)
    {
        $id = $this->input->post('id_user');
        $nama = $this->input->post('name');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('telp');
        $role_id = $this->input->post('posisi');
        $pass = $this->input->post('password1');

        if ($pass != '') {
            $passDB = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $this->db->set('password', $passDB);
        }

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

    public function hapusPegawai($id)
    {
        $this->db->delete('tbl_user', ['id_user' => $id]);
    }

    public function getPembelian()
    {
        return $this->db->get('tbl_trans_beli')->result_array();
    }

    public function getAllQty()
    {
        $this->db->select('SUM(qty) as t_qty');
        $this->db->from('tbl_barang');
        return $this->db->get()->row()->t_qty;
    }

    public function getPenjualan()
    {
        return $this->db->get('tbl_jual_detail')->result_array();
    }

    public function addItemPromo($brg)
    {
        foreach ($brg as $b => $val) {
            $this->db->select('*');
            $this->db->from('tbl_barang');
            $this->db->where('kode_brg', $_POST['barang'][$b]);
            $data[] = $this->db->get()->row_array();
        }

        for ($i = 0; $i < count($data); $i++) {
            $kodeBrg[] = $data[$i]['kode_brg'];
            $namaBrg[] = $data[$i]['nama_brg'];
            $qtyBrg[] = '1';
            $hargaBrg[] = $data[$i]['harga_jual'];
            $diskonBrg[] = '0';
            $jadwalId[] = '0';
        }

        $kode = implode(', ', $kodeBrg);
        $nama = implode(', ', $namaBrg);
        $qty = implode(', ', $qtyBrg);
        $harga = implode(', ', $hargaBrg);
        $diskon = implode(', ', $diskonBrg);
        $jadwal = implode(', ', $jadwalId);

        $result = [
            'nama_promo' => '-',
            'kode_brg' => $kode,
            'nama_brg' => $nama,
            'qty_brg' => $qty,
            'harga_brg' => $harga,
            'diskon_brg' => $diskon,
            'jadwal_id' => $jadwal
        ];

        $sql = $this->db->insert('tbl_promo', $result);

        if ($sql) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }

    public function getItemPromo()
    {
        $items = $this->db->get('tbl_promo')->result_array();
        $data = [
            'id_promo' => $items[0]['id_promo'],
            'kode' => explode(', ', $items[0]['kode_brg']),
            'nama' => explode(', ', $items[0]['nama_brg']),
            'qty' => explode(', ', $items[0]['qty_brg']),
            'harga' => explode(', ', $items[0]['harga_brg']),
            'diskon' => explode(', ', $items[0]['diskon_brg'])
        ];

        return $data;
    }
}
