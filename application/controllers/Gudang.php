<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard3V');
        $this->load->view('templates/footer');
    }

    public function infoStok()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/infoStokV');
        $this->load->view('templates/footer');
    }

    public function inputBarang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/inputBarangV');
        $this->load->view('templates/footer');
    }

    public function infoSupplier()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/infoSupplierV');
        $this->load->view('templates/footer');
    }
}