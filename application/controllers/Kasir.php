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
        
        $data['muncul'] = $this->db->get('tbl_tampung')->row_array();
        $data['tampung'] = $this->db->get('tbl_tampung')->result_array();
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'trim|required');
        $data['barang'] = $this->Mod_gudang->getBarang();
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Penjualan';
            $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['invoice'] = $this->Mod_kasir->invoice_no();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('kasir/penjualanV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_kasir->tampung();
        }
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

        $data['wish'] = $this->Mod_kasir->getWish();
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
        $data['judul'] = 'Returment';

        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
      
        $this->load->view('kasir/returmentV');
        $this->load->view('templates/footer');
    }
}
