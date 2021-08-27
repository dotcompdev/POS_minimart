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

    public function penjualan()
    {
    }

    public function wishlist()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kasir/wishlistV');
        $this->load->view('templates/footer');
    }

    public function returment()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kasir/returmentV');
        $this->load->view('templates/footer');
    }
}
