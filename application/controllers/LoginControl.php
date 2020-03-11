<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginControl extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('perusahaan/M_Perusahaan');
        $this->load->model('personalia/M_Personalia');
        // $this->load->model('cit/perusahaan/M_Jabatan', 'master');
        $this->load->model('perusahaan/M_Jabatan', 'jabatan');


    }

    ////PERUSAHAAN////
    public function perusahaan(){
        $this->load->view('login/perusahaan');
    }

    public function login_perusahaan(){
        $where = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'status' => 1
        ];
        $item = $this->M_Perusahaan->login_perusahaan($where);
        if(count($item) == 1 && $item[0]{'perusahaan_status'} == 1){
            $data_session = [
                'id_perusahaan' => $item[0]{'id_perusahaan'}, 
                'id_jenus' => $item[0]{'id_jenus'}, 
                'nama_perusahaan' => $item[0]{'perusahaan_nama'}, 
                'auth' => $item[0]{'perusahaan_auth'}, 
                'status' => "login" 
            ];
            $this->session->set_userdata($data_session);
            redirect('login/user');
        }else{
            $this->session->set_flashdata('notif','gagal');
            redirect('login/perusahaan');
        }
    }
    ////////////////////////////////////////////////////////

    ////PERSONALIA////
    public function user(){
        $this->load->view('login/user');
    }

    public function login_user(){
        $where = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'status' => 1
        ];
        $item = $this->M_Personalia->login_user($where);
        $jabatan = $this->jabatan->get_jabatan(array('id_jabatan' => $item[0]{'key_jabatan'}));
        if(count($item) == 1){
            $data_session = [
                'id_perusahaan' => $this->session->userdata('id_perusahaan'),
                'id_jenus' => $this->session->userdata('id_jenus'), 
                'nama_perusahaan' => $this->session->userdata('nama_perusahaan'), 
                'auth' => $this->session->userdata('auth'), 
                'id_user' => $item[0]{'id_user'}, 
                'nama_user' => $item[0]{'user_nama'}, 
                'jabatan' => $jabatan == NULL ? NULL : $jabatan, 
                'status' => "login" 
            ];
            $this->session->set_userdata($data_session);
            redirect();
        }else{
            $this->session->set_flashdata('notif','gagal');
            redirect('login/user');
        }
    }
    ////////////////////////////////////////////////////////


    function logout(){
        $this->session->sess_destroy();
        redirect('login/perusahaan');
    }
}
?>