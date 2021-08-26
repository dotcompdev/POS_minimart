<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kasir');
    }

    public function penjualan()
    {
        $data['judul'] = 'Penjualan';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->Mod_kasir->invoice_no();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kasir/penjualanV', $data);
        $this->load->view('templates/footer');
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
