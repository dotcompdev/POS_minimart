<?php
class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Mod_supervisor');
        $user_id = $this->ci->session->userdata('email');
        $user_data = $this->ci->Mod_supervisor->get($user_id)->row();
        return $user_data;
    }
}
