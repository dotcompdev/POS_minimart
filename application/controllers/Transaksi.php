<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_transaksi');
    }

    public function cetakStruk()
    {
        $kembalian = $this->input->post('kembali');

        if ($kembalian >= 0) {
            $data = array();
            $trans = $this->db->get('tbl_tampung')->result_array();

            foreach ($trans as $d) {
                $brg = $this->db->get_where('tbl_barang', ['kode_brg' => $d['kode_barang']])->row_array();

                $da = $brg['qty'] - $d['qty'];
                $this->db->set('qty', $da);
                $this->db->where('kode_brg', $d['kode_barang']);
                $this->db->update('tbl_barang');


                array_push($data, array(
                    'invoice' => $this->input->post('invoice_item', true),
                    'barang_id' => $d['kode_barang'],
                    'barang_nama' => $d['barang'],
                    'tgl_transaksi' => time(),
                    'user_id' => $this->input->post('nama_kasir', true),
                    'harga_jual' => $d['harga_jual'],
                    'qty_jual' => $d['qty'],
                    'sub_total' => $d['subtotal'],
                    'total_diskon' => $d['diskon'],
                    'cash' => $this->input->post('cash', true),
                    'promo_id' => 0
                ));
            }
            $sql = $this->Mod_transaksi->save_batch($data);

            $total = $this->Mod_transaksi->readTransTotal();
            $t_qty = $this->Mod_transaksi->readTransQty();

            $result = [
                'waktu_trans' => time(),
                'user' => $this->input->post('nama_kasir', true),
                'invoice' => $this->input->post('invoice_item', true),
                'total_qty' => $t_qty,
                'cash' => $this->input->post('cash', true),
                'total_bayar' => $total
            ];
            $this->db->insert('tbl_jual_detail', $result);

            if ($sql) {
                $this->Mod_transaksi->delete_tampung();
                $data = $this->db->get_where('tbl_trans_jual', ['invoice' => $this->input->post('invoice_item')])->row_array();
                // print_r($data);
                // $this->load->view('cetak/strukPenjualan', $data);
                redirect('kasir');
            } else {
                redirect('kasir');
            }
        } else {
            redirect('kasir');
        }
    }
}
