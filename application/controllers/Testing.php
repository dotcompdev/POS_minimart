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
        $data['judul'] = 'Info Promo';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/promo/promoV');
        $this->load->view('templates/footer');
    }

    public function tenPromo()
    {
        $data['judul'] = 'Tentukan Promo';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
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
