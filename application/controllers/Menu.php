<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function barangTerlaris()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/barangTerlarisV');
        $this->load->view('templates/footer');
    }

    public function waktuTerpadat()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/waktuV');
        $this->load->view('templates/footer');
    }

    public function pencarianPelanggan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/pencarianPelangganV');
        $this->load->view('templates/footer');
    }
}