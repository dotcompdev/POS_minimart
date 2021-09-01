<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_gudang');
        $this->load->model('Mod_kasir');
    }

    public function index()
    {
        $now = time();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['muncul'] = $this->db->get('tbl_tampung')->row_array();
        $data['tampung'] = $this->db->get('tbl_tampung')->result_array();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'trim|required');
        $data['barang'] = $this->Mod_gudang->getBarang();
        $data['judul'] = 'Penjualan';
        $data['invoice_item'] = $this->Mod_kasir->invoice_no();
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kasir/penjualanV', $data);
        $this->load->view('templates/footer');
    }

    public function tampung($kode)
    {
        $this->Mod_kasir->tampung($kode);
    }

    public function editTam()
    {
        $kode = $this->input->post('kodBrg');
        $qty = $this->input->post('qtyBrg');
        $harga = $this->input->post('harBrg');
        $diskon = $this->input->post('disk');
        $subtotal = $qty * $harga;
        $hasil = $subtotal - $diskon;

        $this->db->set('qty', $qty);
        $this->db->set('diskon', $diskon);
        $this->db->set('subtotal', $hasil);
        $this->db->where('kode_barang', $kode);
        $this->db->update('tbl_tampung');
        redirect('kasir');
    }

    public function hapusAll()
    {
        $this->db->empty_table('tbl_tampung');
        redirect('kasir');
    }

    public function pilihPromo()
    {
        $this->Mod_kasir->promo();
    }

    public function ubah($id)
    {
        $data['item'] = $this->db->get_where('tbl_tampung', ['id_trans' => $id])->row_array();
    }

    public function hapus($id)
    {
        $data['item'] = $this->db->get_where('tbl_tampung', ['id_trans' => $id])->row_array();
        $this->Mod_kasir->hapusItem($id);
        redirect('kasir');
    }

    public function wishlist()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wish'] = $this->Mod_kasir->getWish();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_wish', 'Nama barang', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Wishlist';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('kasir/wishlistV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_kasir->wishlist();
        }
    }

    public function returment()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('qty_retur', 'QTY', 'required|trim');
        $this->form_validation->set_rules('opsi', 'Opsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Returment';
            $data['detail'] = $this->Mod_kasir->getTransJual();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kasir/returmentV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_kasir->returment();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            redirect('Kasir/returment');
        }
    }

    public function getBrg($keyword)
    {
        // $items = $this->Mod_kasir->getAllBrg($keyword);
        echo json_encode($keyword);
    }

    public function getItem($invoice)
    {
        $item = $this->Mod_kasir->getTransItem($invoice)->result();
        echo json_encode($item);
    }
}
