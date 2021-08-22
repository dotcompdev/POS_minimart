<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function penjualan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kasir/penjualanV');
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