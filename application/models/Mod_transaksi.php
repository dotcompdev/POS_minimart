<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_transaksi extends CI_Model
{
  public function save_batch($data)
  {
    return $this->db->insert_batch('tbl_trans_jual', $data);
  }

  function delete_tampung()
  {
    $this->db->empty_table('tbl_tampung');
  }

  function readTransTotal()
  {
    $inv = $this->input->post('invoice_item', true);
    $this->db->select('SUM(sub_total) as total');
    $this->db->where('invoice', $inv);
    $this->db->from('tbl_trans_jual');
    return $this->db->get()->row()->total;
  }

  function readTransQty()
  {
    $inv = $this->input->post('invoice_item', true);
    $this->db->select('SUM(qty_jual) as t_qty');
    $this->db->where('invoice', $inv);
    $this->db->from('tbl_trans_jual');
    return $this->db->get()->row()->t_qty;
  }
}
