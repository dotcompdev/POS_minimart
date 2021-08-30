<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_kasir extends CI_Model
{
  public function invoice_no()
  {
    $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no
            FROM tbl_trans_jual
            WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $n = ((int)$row->invoice_no) + 1;
      $no = sprintf("%'.04d", $n);
    } else {
      $no = "0001";
    }
    $invoice = "PM" . date('ymd') . $no;
    return $invoice;
  }

  public function tampung()
  {
    $nama = $this->db->get_where('tbl_tampung', ['kode_barang' => $this->input->post('kode_barang')])->row_array();
    $kod = $this->input->post('kode_barang');
    $qty = $nama['qty'];
    if ($nama) {
      $qty += 1;
      $subtotal = $qty * intval(htmlspecialchars($this->input->post('harga_jual', true)));
      $this->db->set('qty', $qty);
      $this->db->set('subtotal', $subtotal);
      $this->db->where('kode_barang', $kod);
      $this->db->update('tbl_tampung');

      redirect('kasir');
    } else {
      $subtotal = 1 * intval(htmlspecialchars($this->input->post('harga_jual', true)));
      $data = [
        'invoice_t' => htmlspecialchars($this->input->post('invoice', true)),
        'kode_barang' => htmlspecialchars($this->input->post('kode_barang', true)),
        'barang' => htmlspecialchars($this->input->post('nama_barang', true)),
        'qty' => 1,
        'harga_jual' => intval(htmlspecialchars($this->input->post('harga_jual', true))),
        'diskon' => 0,
        'subtotal' => $subtotal
      ];

      $this->db->insert('tbl_tampung', $data);
      redirect('kasir');
    }
  }

  public function hapusItem($id)
  {
    $this->db->delete('tbl_tampung', ['id_trans' => $id]);
  }

  public function wishlist()
  {
    $barang = [
      'nama_brg' => htmlspecialchars($this->input->post('nama_wish', true)),
      'created' => time()
    ];

    $this->db->insert('tbl_barang', $barang);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang berhasil ditambahkan!</div>');
    redirect('kasir/wishlist');
  }

  public function getWish()
  {
    $this->db->from('tbl_barang');
    $this->db->where('kategori', '');
    return $this->db->get()->result_array();
  }

  public function getTransJual()
  {
    return $this->db->get('tbl_jual_detail')->result_array();
  }

  public function getTransItem($invoice)
  {
    $this->db->from('tbl_trans_jual');
    $this->db->where('invoice', $invoice);
    return $this->db->get();
  }
}
