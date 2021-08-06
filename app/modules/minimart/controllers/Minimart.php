<?php

class Minimart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('minimart/Tambah_v');
    }

    function coba()
    {
        $this->load->module('minimart/Coba');
        $this->coba->tambah();
    }
}
