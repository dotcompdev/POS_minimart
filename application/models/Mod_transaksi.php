<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_transaksi extends CI_Model
{
  public function save_batch($data)
  {
    return $this->db->insert_batch('tbl_trans_jual', $data);
  }

  function delete_tampung($id)
  {
    $this->db->delete('tbl_tampung', array('invoice_t' => $id));
  }
}
