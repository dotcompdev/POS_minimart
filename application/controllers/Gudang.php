<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_gudang');
        $this->load->model('Mod_supervisor');
    }

    public function index()
    {
        $data['supplier'] = $this->Mod_supervisor->getSupplier();
        $data['total_brg'] = $this->Mod_supervisor->getAllQty();
        $data['judul'] = "Petugas Gudang";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard3V', $data);
        $this->load->view('templates/footer');
    }

    public function infoStok()
    {
        $data['judul'] = "Info Stok";
        $data['barang'] = $this->Mod_gudang->get();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/infoStokV', $data);
        $this->load->view('templates/footer');
    }

    public function cariStok()
    {
        $this->Mod_gudang->getStok();
    }

    public function inputBarang()
    {
        $data['product'] = $this->db->get_where('tbl_barang', ['kategori' => ''])->result_array();

        $this->form_validation->set_rules('supplier', 'Supplier', 'trim');
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('qtyM', 'QTY', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_jual', 'Harga jual', 'trim|required|is_natural_no_zero');
        $data['barang'] = $this->Mod_gudang->get();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Input Barang";
            $data['supplier'] = $this->Mod_gudang->getSupplier();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('gudang/inputBarangV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_gudang->tambahStok();
        }
    }

    public function barangBaru()
    {
        $id = $this->input->post('idBrgBaru');
        $this->Mod_gudang->tambahBarang($id);
    }

    public function ubah($id)
    {
        $data['judul'] = "Ubah Barang";
        $data['barang'] = $this->db->get_where('tbl_barang', ['id_brg' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('gudang/editStokV', $data);
        $this->load->view('templates/footer');
    }

    public function ubahBarang()
    {
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('harga_jual', 'Harga', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Ubah Barang";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('gudang/eidtStokV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_gudang->ubahBrg();
        }
    }

    public function hapus($id)
    {
        $data['barang'] = $this->db->get_where('tbl_barang', ['id_brg' => $id])->row_array();

        $this->Mod_gudang->hapusBarang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang telah dihapus!</div>');
        redirect('gudang/infoStok');
    }

    public function infoSupplier()
    {
        $data['judul'] = "Info Supplier";
        $data['supplier'] = $this->Mod_gudang->getSupplier();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
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

    public function fetch()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Mod_gudang->fetch_data($query);
        $output .= '
        <table class="table table-head-fixed text-nowrap">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                    <tr>
                        <td>' . $row["kode_brg"] . '</td>
                        <td>' . $row["nama_brg"] . '</td>
                        <td>' . indo_currency($row["harga_jual"]) . '</td>
                        <td><button id="pilih" class="btn btn-primary btn-sm" type="submit" data-kode="' . $row["kode_brg"] . '" data-nama="' . $row["nama_brg"] . '" data-kategori="' . $row["kategori"] . '" data-satuan="' . $row["unit"] . '" data-harga="' . $row["harga_jual"] . '" data-qty="' . $row["qty"] . '">Pilih</button></td>
                    </tr>
                
                ';
            }
        } else {
            $output .= '<tr>
							<td colspan="5">No Data Found</td>
						</tr>';
        }
        $output .= '
        </tbody>
        </table>';
        echo $output;
    }
}
