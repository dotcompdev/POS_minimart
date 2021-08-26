<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_supervisor();
        $this->load->model('Mod_supervisor');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Supervisor";
        $data['user'] = $this->Mod_supervisor->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/dashboardV', $data);
        $this->load->view('templates/footer');
    }

    public function registration()
    {
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
            $data['judul'] = "Tambah Akun";
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

    public function fetch()
    {
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data['judul'] = "Info Pegawai";
        $data['user'] = $this->Mod_supervisor->fetch_data($query);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pegawai/infoPegawai', $data);
        $this->load->view('templates/footer');
    }

    // PEMBUKUAN--------------------------------------------------
    public function j_penjualan()
    {
        $data['judul'] = "Jurnal Penjualan";
        $data['penjualan'] = $this->Mod_supervisor->getPenjualan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pembukuan/j_penjualanV');
        $this->load->view('templates/footer');
    }

    public function j_pembelian()
    {
        $data['judul'] = "Jurnal Pembelian";
        $data['pembelian'] = $this->Mod_supervisor->getPembelian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('supervisor/pembukuan/j_pembelianV');
        $this->load->view('templates/footer');
    }

    public function j_retur()
    {
        $data['judul'] = "Jurnal Retur";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
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
}
