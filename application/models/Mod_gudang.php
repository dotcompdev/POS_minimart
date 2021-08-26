<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_gudang extends CI_Model
{
    public function tambahBarang()
    {
        $kodeBarang = $this->input->post('kode_barang', true);
        $barang = [
            'kode_brg' => htmlspecialchars($kodeBarang),
            'nama_brg' => htmlspecialchars($this->input->post('nama_barang'), true),
            'kategori' => htmlspecialchars($this->input->post('kategori', true)),
            'unit' => htmlspecialchars($this->input->post('satuan', true)),
            'harga_jual' => 0,
            'qty' => 0,
            'created' => time()
        ];

        $this->db->insert('tbl_barang', $barang);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang berhasil ditambahkan!</div>');
        redirect('gudang/infoStok');
    }

    public function tambahStok()
    {
        $kodeBarang = $this->input->post('kode_barang', true);

        $qty = intval($this->input->post('qtyA', true)) + intval($this->input->post('qtyM', true));
        $harga = htmlspecialchars($this->input->post('harga_jual', true));

        $trans_beli = [
            'supplier_nama' => htmlspecialchars($this->input->post('supplier', true)) == '' ? "-" : htmlspecialchars($this->input->post('supplier', true)),
            'brg_kode' => htmlspecialchars($this->input->post('kode_barang', true)),
            'brg_nama' => htmlspecialchars($this->input->post('nama_barang', true)),
            'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
            'qty_beli' => htmlspecialchars($this->input->post('qtyM', true)),
            'tgl_beli' => time()
        ];

        $this->db->set('harga_jual', $harga);
        $this->db->set('qty', $qty);
        $this->db->where('kode_brg', $kodeBarang);
        $this->db->update('tbl_barang');
        $this->db->insert('tbl_trans_beli', $trans_beli);
        redirect('gudang/infoStok');
    }

    public function hapusBarang($id)
    {
        $this->db->delete('tbl_barang', ['id_brg' => $id]);
    }

    public function get()
    {
        return $this->db->get('tbl_barang')->result_array();
    }

    public function getStok($cari)
    {
        $this->db->like('kode_brg', $cari);
        $this->db->or_like('nama_brg', $cari);
        return $this->db->get('tbl_barang')->result_array();
    }

    public function getModal($kode = null)
    {
        $this->db->from('tbl_barang');
        if ($kode != null) {
            $this->db->where('barang', $kode);
        }
        $query = $this->db->get();
        return $query;
    }

    public function ubahBrg()
    {
        $id_brg = $this->input->post('id_brg');
        $kodeBrg = $this->input->post('kode_barang');
        $namaBrg = $this->input->post('nama_barang');
        $kategori = $this->input->post('kategori');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga_jual');

        $this->db->set('kode_brg', $kodeBrg);
        $this->db->set('nama_brg', $namaBrg);
        $this->db->set('kategori', $kategori);
        $this->db->set('unit', $satuan);
        $this->db->set('harga_jual', $harga);
        $this->db->where('id_brg', $id_brg);
        $this->db->update('tbl_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui!</div>');
        redirect('gudang/infoStok');
    }

    public function tambahSupplier()
    {
        $supp = $this->input->post('nama_sup', true);

        $data = [
            'nama_supplier' => htmlspecialchars($supp),
            'alamat_supplier' => htmlspecialchars($this->input->post('alamat', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
        ];

        $this->db->insert('tbl_supplier', $data);
        redirect('gudang/infoSupplier');
    }

    public function getSupplier()
    {
        return $this->db->get('tbl_supplier')->result_array();
    }
}
