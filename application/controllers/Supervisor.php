<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller 
{
    public function index()
    {

        $this->load->view('dashboardV');
    }
}