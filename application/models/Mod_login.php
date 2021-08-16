<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_login extends CI_Model 
{
    
    // public function ambilLogin($username, $password)
    // {
    //     $this->db->where('username', $username);
    //     $this->db->where('password', $password);

    //     $query = $this->db->get('tbl_user');
    //     if ($query->num_rows()>0) {
    //         foreach($query->result() as $row) {
    //             $sess = array ('username' => $row->username,
    //                             'password' => $row->password
    //             );
    //         }
    //         $this->session->get_userdata($sess);
    //         redirect('supervisor');
    //     } else {
    //         $this->session->set_flashdata('info', 'Maaf username dan password anda salah');
    //         redirect('login');
    //     }
    // }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        if($user) {
            if ($user['is_active'] == 1) {
                if($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    
                    redirect('supervisor');
                }
            }else{
                echo 'ikoy';

            }
        } 
    }

}