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

    public function tampungItem($brg)
    {
        $data = array();
        foreach ($brg as $b => $val) {
            $this->db->select('*');
            $this->db->from('tbl_barang');
            $this->db->where('kode_brg', $_POST['barang'][$b]);
            $dataBrg[] = $this->db->get()->row_array();
        }

        foreach ($dataBrg as $brg) {
            array_push($data, array(
                'kode_brg' => $brg['kode_brg'],
                'nama_brg' => $brg['nama_brg'],
                'qty_brg' => 1,
                'harga_brg' => $brg['harga_jual'],
                'diskon_brg' => 0
            ));
        }
        $this->db->insert_batch('tbl_promo', $data);
    }

    public function tampungItemEdit($items)
    {

        function fill_chunck($array, $parts)
        {
            $t = 0;
            $result = array_fill(0, $parts - 1, array());
            $max = ceil(count($array) / $parts);
            foreach ($array as $v) {
                count($result[$t]) >= $max and $t++;
                $result[$t][] = $v;
            }
            return $result;
        }

        for ($j = 0; $j < count($items[0]); $j++) {
            for ($i = 0; $i < count($items); $i++) {
                $data[] = $items[$i][$j];
            }
        }

        // $hasil = fill_chunck($data, 5);
        print_r($data);
    }

    public function addItemPromo()
    {
        $itemPromo = $this->db->get('tbl_promo')->result_array();

        for ($i = 0; $i < count($itemPromo); $i++) {
            $kodeBrg[] = $itemPromo[$i]['kode_brg'];
            $namaBrg[] = $itemPromo[$i]['nama_brg'];
            $qtyBrg[] = $itemPromo[$i]['qty_brg'];
            $hargaBrg[] = $itemPromo[$i]['harga_brg'];
            $diskonBrg[] = $itemPromo[$i]['diskon_brg'];
        }

        $kode = implode(', ', $kodeBrg);
        $nama = implode(', ', $namaBrg);
        $qty = implode(', ', $qtyBrg);
        $harga = implode(', ', $hargaBrg);
        $diskon = implode(', ', $diskonBrg);

        $waktuAwal = strtotime($this->input->post('tglAwal'));
        $waktuAkhir = strtotime($this->input->post('tglAkhir'));

        $hari = $this->input->post('hari');

        $jadwal = [
            'tgl_mulai' => $waktuAwal,
            'tgl_berakhir' => $waktuAkhir,
            'hari_frek' => $hari
        ];

        $this->db->insert('tbl_jadwal', $jadwal);
        $jadwal_id = $this->db->insert_id();

        $result = [
            'nama_promo' => htmlspecialchars($this->input->post('nama_promo')),
            'kode_brg' => $kode,
            'nama_brg' => $nama,
            'qty_brg' => $qty,
            'harga_brg' => $harga,
            'diskon_brg' => $diskon,
            'jadwal' => $jadwal_id
        ];

        $sql = $this->db->insert('tbl_promo_detail', $result);
        $this->db->empty_table('tbl_promo');

        if ($sql) {
            redirect('supervisor/promo');
        } else {
            redirect('supervisor/tenPromo');
        }
    }

    public function getItemPromo()
    {
        return $this->db->get('tbl_promo')->result_array();
    }

    public function hapusItemPromoID($id)
    {
        $this->db->delete('tbl_promo', ['id_promo' => $id]);
    }

    public function hapusPromoID($id, $jadwal)
    {
        $this->db->delete('tbl_promo_detail', ['id' => $id]);
        $this->db->delete('tbl_jadwal', ['id_jadwal' => $jadwal]);
    }

    public function getAllItemPromo()
    {
        $data = array('');
        $item = $this->db->get('tbl_promo_detail')->result_array();
        foreach ($item as $i) {
            $this->db->select('tgl_mulai');
            $this->db->where('id_jadwal', $i['jadwal']);
            $this->db->from('tbl_jadwal');
            $waktuAwal = $this->db->get()->result_array();
            $waktuMulai = $waktuAwal[0]['tgl_mulai'];

            $this->db->select('tgl_berakhir');
            $this->db->where('id_jadwal', $i['jadwal']);
            $this->db->from('tbl_jadwal');
            $waktuAkhir = $this->db->get()->result_array();
            $waktuBerakhir = $waktuAkhir[0]['tgl_berakhir'];

            $this->db->select('hari_frek');
            $this->db->where('id_jadwal', $i['jadwal']);
            $this->db->from('tbl_jadwal');
            $hari = $this->db->get()->result_array();
            $hariFrek = $hari[0]['hari_frek'];

            array_push($data, array(
                'namaPromo' => $i['nama_promo'],
                'waktuAwal' => $waktuMulai,
                'waktuAkhir' => $waktuBerakhir,
                'hari' => $hariFrek,
                'idPromo' => $i['id'],
                'jadwalPromo' => $i['jadwal']
            ));
        }

        return $data;
    }

    public function getAllItem($itemPromo)
    {
        $this->db->from('tbl_promo_detail');
        $this->db->where('id', $itemPromo);
        $data = $this->db->get()->row_array();
        $kode = explode(', ', $data['kode_brg']);
        $nama = explode(', ', $data['nama_brg']);
        $qty = explode(', ', $data['qty_brg']);
        $harga = explode(', ', $data['harga_brg']);
        $diskon = explode(', ', $data['diskon_brg']);

        $result = array(
            $kode,
            $nama,
            $qty,
            $harga,
            $diskon
        );

        return $result;
    }

    public function updatePromo()
    {
        $idPromo = $this->input->post('idPromo');
        $qtyPromo = $this->input->post('qty');
        $diskonPromo = $this->input->post('diskon');
        $this->db->set('qty_brg', $qtyPromo);
        $this->db->set('diskon_brg', $diskonPromo);
        $this->db->where('id_promo', $idPromo);
        $this->db->update('tbl_promo');
    }
}
