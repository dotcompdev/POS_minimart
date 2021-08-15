<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/dashboardV');
        $this->load->view('templates/footer');
    }

    public function infoPegawai()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pegawai/infoPegawai');
        $this->load->view('templates/footer');
    }

    public function tambahPegawai()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pegawai/tambahPegawai');
        $this->load->view('templates/footer');
    }
}

