<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function penjualan()
    {
        $data['judul'] = 'Penjualan';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kasir/penjualanV');
        $this->load->view('templates/footer');
        
    }

    public function wishlist()
    {
        $data['judul'] = 'Wishlist';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kasir/wishlistV');
        $this->load->view('templates/footer');
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
