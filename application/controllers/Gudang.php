<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = "Petugas Gudang";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard3V');
        $this->load->view('templates/footer');
    }

    public function infoStok()
    {
        $data['judul'] = "Info Stok";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/infoStokV');
        $this->load->view('templates/footer');
    }

    public function inputBarang()
    {
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|trim|is_unique[tbl_barang.kode_brg]', [
            'is_unique' => 'kode sudah digunakan!'
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required');
        $this->form_validation->set_rules('harga_jual', 'Harga jual', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Input Barang";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('gudang/inputBarangV');
            $this->load->view('templates/footer');
        }
    }

    public function infoSupplier()
    {
        $data['judul'] = "Info Supplier";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/infoSupplierV');
        $this->load->view('templates/footer');
    }
}
