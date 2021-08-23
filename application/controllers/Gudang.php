<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_gudang');
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
        $data['barang'] = $this->Mod_gudang->get();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/infoStokV', $data);
        $this->load->view('templates/footer');
    }

    public function inputBarang()
    {
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim');
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('qty', 'QTY', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_jual', 'Harga jual', 'trim|required|is_natural_no_zero');
        $data['barang'] = $this->Mod_gudang->get();

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Input Barang";
            $data['supplier'] = $this->Mod_gudang->getSupplier();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('gudang/inputBarangV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_gudang->tambahBarang();
        }
    }

    public function inputModal($kode)
    {
        $data['brgPilih'] = $this->Mod_gudang->getModal($kode);
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim');
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('qty', 'QTY', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_jual', 'Harga jual', 'trim|required|is_natural_no_zero');

        $data['barang'] = $this->Mod_gudang->get();

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Input Barang";
            $data['supplier'] = $this->Mod_gudang->getSupplier();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('gudang/inputBarangV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_gudang->tambahBarang();
        }
    }

    public function infoSupplier()
    {
        $data['judul'] = "Info Supplier";
        // $data['start'] = $this->uri->segment(3);
        $data['supplier'] = $this->Mod_gudang->getSupplier();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/infoSupplierV', $data);
        $this->load->view('templates/footer');
    }

    public function inputSupplier()
    {
        $this->form_validation->set_rules('nama_sup', 'Nama Supplier', 'required|is_unique[tbl_supplier.nama_supplier]', [
            'is_unique' => 'This name has already registered!'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomer telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            redirect('gudang/infoSupplier');
        } else {
            $this->Mod_gudang->tambahSupplier();
        }
    }
}
