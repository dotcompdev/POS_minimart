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


        $data = array();
        $trans = $this->db->get('tbl_tampung')->result_array();

        foreach ($trans as $d) {
            $brg = $this->db->get_where('tbl_barang', ['kode_brg' => $d['kode_barang']])->row_array();

            $da = $brg['qty'] - $d['qty'];
            $this->db->set('qty', $da);
            $this->db->where('kode_brg', $d['kode_barang']);
            $this->db->update('tbl_barang');


            array_push($data, array(
                'invoice' => $this->input->post('invoice', true),
                'barang_id' => $d['kode_barang'],
                'tgl_transaksi' => time(),
                'user_id' => $this->input->post('nama_kasir', true),
                'qty_jual' => $d['qty'],
                'sub_total' => $d['subtotal'],
                'total_diskon' => $d['diskon'],
                'cash' => $this->input->post('cash', true),
                'promo_id' => "-"
            ));
        }
        $sql = $this->Mod_transaksi->save_batch($data);

        $total = $this->Mod_transaksi->readTransQty();

        $result = [
            'waktu_trans' => time(),
            'user' => $this->input->post('nama_kasir', true),
            'invoice' => $this->input->post('invoice', true),
            'cash' => $this->input->post('cash', true),
            'total_bayar' => $total
        ];
        $this->db->insert('tbl_jual_detail', $result);

        if ($sql) {
            $id = $this->input->post('delete_id', true);
            $this->Mod_transaksi->delete_tampung($id);
            $this->load->view('cetak/strukPenjualan');
        } else {
            echo "gagal";
        }
    }
}
