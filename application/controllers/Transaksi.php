<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cetakStruk()
    {
        $this->load->view('cetak/strukPenjualan');
    }
}