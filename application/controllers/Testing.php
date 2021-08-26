<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }



    // PROMO------------------------------------------------------

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

    // RANGKUMAN BISNIS----------------------------------------------
    // public function barangTerlaris()
    // {
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('supervisor/rangkuman/barangTerlarisV');
    //     $this->load->view('templates/footer');
    // }

    // public function pencarianPelanggan()
    // {
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('supervisor/rangkuman/pencarianPelangganV');
    //     $this->load->view('templates/footer');
    // }
}
