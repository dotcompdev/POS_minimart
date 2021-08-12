<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller 
{
    public function index()
    {
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/dashboardV');
        $this->load->view('templates/footer');
    }

    public function j_penjualan()
    {
        $this->load->view('templates/j_header');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pembukuan/j_penjualanV');
        $this->load->view('templates/footer');
        $this->load->view('templates/j_footer');
    }
    
    public function j_pembelian()
    {
        // $this->load->view('templates/j_header');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pembukuan/j_pembelianV');
        $this->load->view('templates/footer');
        // $this->load->view('templates/j_footer');

    }

    public function j_retur()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pembukuan/j_returV');
        $this->load->view('templates/footer');
    }

    public function promo()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/promo/promoV');
        $this->load->view('templates/footer');
    }

    public function tenPromo()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/promo/tenPromoV');
        $this->load->view('templates/footer');
    }
}