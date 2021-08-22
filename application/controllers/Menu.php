<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    }

    public function barangTerlaris()
    {
        $data['judul'] = "Barang Terlaris";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/barangTerlarisV');
        $this->load->view('templates/footer');
    }

    public function waktuTerpadat()
    {
        $data['judul'] = "Waktu Terpadat";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/waktuV');
        $this->load->view('templates/footer');
    }

    public function pencarianPelanggan()
    {
        $data['judul'] = "Pencarian Pelanggan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/pencarianPelangganV');
        $this->load->view('templates/footer');
    }
}
