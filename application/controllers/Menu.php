<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kasir');
    }

    public function index()
    {
    }

    public function barangTerlaris()
    {

        check_supervisor();

        $this->db->get('tbl_trans_jual')->result_array();

        $data['judul'] = "Barang Terlaris";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/barangTerlarisV');
        $this->load->view('templates/footer');
    }

    public function waktuTerpadat()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Waktu Terpadat";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/waktuV');
        $this->load->view('templates/footer');
    }

    public function pencarianPelanggan()
    {

        $data['wish'] = $this->Mod_kasir->getWish();

        $data['judul'] = "Pencarian Pelanggan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/rangkuman/pencarianPelangganV', $data);
        $this->load->view('templates/footer');
    }
}
