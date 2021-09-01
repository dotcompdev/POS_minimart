<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_supervisor();
        $this->load->model('Mod_kasir');
        $this->load->model('Mod_supervisor');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->db->select('waktu_trans,total_qty');

        $dataProdukChart = $this->db->get("tbl_jual_detail")->result();
        foreach ($dataProdukChart as $k => $v) {
            $arrProd[] = ['label' => date('h M y', $v->waktu_trans), 'y' => $v->total_qty];
        }
        if ($arrProd != '') {
            $data['chart'] = $arrProd;
        } else {
            $data['chart'] = '';
        }

        $data['promo'] = $this->Mod_supervisor->getPromo();
        $data['judul'] = "Supervisor";
        $data['user'] = $this->Mod_supervisor->get();
        $data['supplier'] = $this->Mod_supervisor->getSupplier();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_brg'] = $this->Mod_supervisor->getAllQty();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/dashboardV', $data);
        $this->load->view('templates/footer');
    }

    public function registration()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        // $this->form_validation->set_rules('image', 'Image', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tambah Pegawai";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('supervisor/pegawai/registrationV');
            $this->load->view('templates/footer');
        } else {
            $this->Mod_supervisor->add();
        }
    }
    public function infoPegawai()
    {
        $data['judul'] = "Info Pegawai";
        $data['user'] = $this->Mod_supervisor->getPegawai();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        if ($this->input->post('keywordPegawai')) {
            $data['user'] = $this->Mod_supervisor->cariDataPegawai();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pegawai/infoPegawai', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $data['user'] = $this->db->get_where('tbl_user', ['id_user' => $id])->row_array();
        $old_image = $data['user']['image'];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }
        $this->Mod_supervisor->hapusPegawai($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pegawai telah dihapus!</div>');
        redirect('supervisor/infoPegawai');
    }

    public function ubah($id)
    {
        $data['pegawai'] = $this->db->get_where('tbl_user', ['id_user' => $id])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->input->post('password1')) {
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]);
        }
        if ($this->input->post('password2')) {
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        }
        // $this->form_validation->set_rules('image', 'Image', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Ubah Akun";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('supervisor/pegawai/editPegawaiV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_supervisor->edit($data);
        }
    }

    public function ubahFix()
    {
        $data['pegawai'] = $this->db->get_where('tbl_user', ['id_user' => $this->input->post('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->input->post('password1')) {
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]);
        }
        if ($this->input->post('password2')) {
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        }
        // $this->form_validation->set_rules('image', 'Image', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Ubah Akun";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('supervisor/pegawai/editPegawaiV', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mod_supervisor->edit($data);
        }
    }

    // PEMBUKUAN--------------------------------------------------
    public function j_penjualan()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = "Jurnal Penjualan";
        $data['penjualan'] = $this->Mod_supervisor->getPenjualan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/pembukuan/j_penjualanV');
        $this->load->view('templates/footer');
    }

    public function j_pembelian()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = "Jurnal Pembelian";
        $data['pembelian'] = $this->Mod_supervisor->getPembelian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/pembukuan/j_pembelianV');
        $this->load->view('templates/footer');
    }

    public function j_retur()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['retur'] = $this->db->get('tbl_retur')->result_array();
        $data['judul'] = "Jurnal Retur";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/pembukuan/j_returV');
        $this->load->view('templates/footer');
    }

    // FUNCTION CETAK 3 JURNAL----------------------------------------------------------------------------------------------------

    public function cetakJurnalJual()
    {
        $this->load->view('cetak/jurnalJual');
    }

    public function cetakJurnalBeli()
    {
        $data['pembelian'] = $this->Mod_supervisor->getPembelian();
        $this->load->view('cetak/jurnalBeli', $data);
    }

    public function cetakJurnalRetur()
    {
        $this->load->view('cetak/jurnalRetur');
    }

    public function promo()
    {
        $data['itemPromo'] = $this->Mod_supervisor->getAllItemPromo();

        $data['judul'] = 'Info Promo';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/promo/promoV');
        $this->load->view('templates/footer');
    }

    public function getItem($itemPromo)
    {
        $items = $this->Mod_supervisor->getAllItem($itemPromo);
        echo json_encode($items);
    }

    public function promoBatal()
    {
        $this->db->empty_table('tbl_promo');
        redirect('supervisor/promo');
    }

    public function tenPromo()
    {
        $data['items'] = $this->Mod_supervisor->getItemPromo();
        $data['product'] = $this->db->get_where('tbl_barang', ['kategori !=' => ''])->result_array();
        $data['judul'] = 'Tentukan Promo';
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/promo/tenPromoV', $data);
        $this->load->view('templates/footer');
    }

    public function editPromo($itemPromo)
    {
        $items = $this->Mod_supervisor->getAllItem($itemPromo);
        $this->Mod_supervisor->tampungItemEdit($items);
        // $data['items'] = $this->Mod_supervisor->getItemPromo();
        // $data['product'] = $this->db->get_where('tbl_barang', ['kategori !=' => ''])->result_array();
        // $data['judul'] = 'Tentukan Promo';
        // $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('supervisor/promo/tenPromoV', $data);
        // $this->load->view('templates/footer');
    }

    public function tampungPromo()
    {
        $brg = $this->input->post('barang', true);
        $this->Mod_supervisor->tampungItem($brg);
        redirect('supervisor/tenPromo');
    }

    public function hapusItemPromo($id)
    {
        $this->Mod_supervisor->hapusItemPromoID($id);
        redirect('supervisor/tenPromo');
    }

    public function hapusPromo($id)
    {
        $this->db->select('jadwal');
        $this->db->where('id', $id);
        $this->db->from('tbl_promo_detail');
        $idJadwal = $this->db->get()->result_array();
        $jadwal = $idJadwal[0]['jadwal'];

        $this->Mod_supervisor->hapusPromoID($id, $jadwal);
        redirect('supervisor/promo');
    }

    public function tambahPromo()
    {
        // $this->form_validation->set_rules('nama_promo', 'Nama Promo', 'trim|required');
        // $this->form_validation->set_rules('tglAwal', 'Waktu awal', 'required|trim|valid_email');
        // $this->form_validation->set_rules('tglAkhir', 'Waktu akhir', 'required|trim');
        // $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
        // if ($this->form_validation->run() == false) {
        //     redirect('supervisor/tenPromo');
        // } else {
        $this->Mod_supervisor->addItemPromo();
        // redirect('supervisor/promo');
        // }
    }

    public function updateItemPromo()
    {
        $this->Mod_supervisor->updatePromo();
        redirect('supervisor/tenPromo');
    }

    public function barangTerlaris()
    {
        check_supervisor();
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $hasil = $this->Mod_supervisor->pilihBarang();
        $data['trans'] = $this->db->get('tbl_trans_jual')->result_array();

        $data['judul'] = "Barang Terlaris";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/rangkuman/barangTerlarisV', $data);
        $this->load->view('templates/footer');
    }

    public function waktuTerpadat()
    {
        $this->db->select('waktu_trans,total_qty');
        $dataProdukChart = $this->db->get("tbl_jual_detail")->result();
        foreach ($dataProdukChart as $k => $v) {
            $arrProd[] = ['label' => date('h M y', $v->waktu_trans), 'y' => $v->total_qty];
        }
        if ($arrProd != '') {
            $data['chart'] = $arrProd;
        } else {
            $data['chart'] = '';
        }

        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Waktu Terpadat";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/rangkuman/waktuV');
        $this->load->view('templates/footer');
    }

    public function pencarianPelanggan()
    {
        $data['nama'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wish'] = $this->Mod_kasir->getWish();

        $data['judul'] = "Pencarian Pelanggan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supervisor/rangkuman/pencarianPelangganV', $data);
        $this->load->view('templates/footer');
    }
}
