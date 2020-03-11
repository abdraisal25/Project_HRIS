<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrasiControl extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('cit/registrasi/M_Registrasi', 'registrasi');
        $this->load->model('personalia/data/M_Data', 'user');
    }

    public function perusahaan($verif){
        $data = [
            'id' => decrypt_url($verif),
            'status' => 0
        ];
        $cek_perusahaan = $this->registrasi->view_perusahaan_detail($data);
        $cek_user = $this->registrasi->view_user_detail($data);
        if(count($cek_perusahaan) == 1){
            $this->load->view('register/perusahaan',$data);
        }else if(count($cek_user) == 0){
            $this->load->view('register/admin',$data);
        }else{
            $this->load->view('register/thankyou');
        }
    }
    
    public function user($verif){
        $data = [
            'id_user' => decrypt_url($verif),
            'status' => 0
        ];
        $cek_user = $this->user->view_detail($data);
        if(!empty($cek_user)){
            $this->load->view('register/user',$data);
        }else{
            $this->load->view('register/thankyou');
        }
    }
    
    public function change($verif){
        $data = [
            'id_user' => decrypt_url($verif),
            'status' => 1
        ];
        $cek_user = $this->user->view_detail($data);
        echo '<pre>';
        var_dump($cek_user);
        die();
        if(!empty($cek_user)){
            $this->load->view('register/user',$data);
        }else{
            $this->load->view('register/thankyou');
        }
    }

    public function registrasi_perusahaan(){
        $data = [
            'id' => $this->input->post('id'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'status' => 1,
        ];
        $this->registrasi->update($data);
        redirect('registrasi/'.encrypt_url($this->input->post('id')));
    }

    public function registrasi_admin(){
        $data = [
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('first-name').' '.$this->input->post('last-name'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'status' => 1
        ];
        $this->registrasi->insert_user($data);
        redirect('registrasi/'.encrypt_url($this->input->post('id')));
    }

    public function registrasi_user(){
        $data = [
            'id_user' => $this->input->post('id'),
            'nama' => $this->input->post('first-name').' '.$this->input->post('last-name'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nip' => $this->input->post('nip'),
            'status' => 1
        ];
        $this->user->insert($data);
        redirect('registrasi/user/'.encrypt_url($this->input->post('id')));
    }

}
?>