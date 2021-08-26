<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_login');
    }

    public function index() 
    {
        $this->load->view('auth/login');
        $this->Mod_login->login();
        
    }

    // public function ceklogin()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     // $this->Mod_login;
    //     // $this->Mod_login->ambilLogin($username, $password);

    //     $user = $this->db->get_where('user', ['username' => $username])->row_array();
    // }
}

/* End of file Login.php */
