<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PersonaliaControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "admin";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('personalia/M_Personalia', 'biodata');
    }

    public function biodata($nama,$id){
        $data = [
            'menu' =>  $this->menu,
            'sub_menu' =>  $this->sub_menu,
            'nama' =>  rawurldecode($this->uri->segment(4)),
            'id_user' => decrypt_url($id)
        ];
        $data['data'] = $this->biodata->view($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/user/biodata');
        $this->load->view('template/footer');
    }

    function modal(){
        $this->load->model('personalia/'.$this->input->get('biodata').'/M_'.$this->input->get('biodata').'', 'fitur');
        $data = [
            'nama' => $this->input->get('nama'),
            'id_user' => $this->input->get('id'),
            'id_biodata' => $this->input->get('key'),
            'fitur' => $this->input->get('biodata')
        ];
        $data['data'] = $this->fitur->biodata_detail($data);
        $this->load->view('perusahaan/user/modal_'.$this->input->get('biodata').'/'.$this->input->get('menu').'',$data);
    }

    function insert(){
        $this->load->model('personalia/'.$this->input->post('fitur').'/M_'.$this->input->post('fitur').'', 'fitur');
        $data = [
            'user' => $this->input->post('user'),
            'id' => $this->input->post('id'),
            'key' => $this->input->post('key'),
            
            'nip' => $this->input->post('nip'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'ktp' => $this->input->post('ktp'),
            'npwp' => $this->input->post('npwp'),
            'nama' => $this->input->post('nama'),
            'tpt_lahir' => $this->input->post('tpt_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'telp' => $this->input->post('telp'),
            'jekel' => $this->input->post('jekel'),
            'darah' => $this->input->post('darah'),
            'agama' => $this->input->post('agama'),
            'perkawinan' => $this->input->post('perkawinan'),
            'alamat' => $this->input->post('alamat'),
            
            'hubungan' => $this->input->post('hubungan'),
            'pendidikan' => $this->input->post('pendidikan'),

            'jenjang' => $this->input->post('jenjang'),
            'kota' => $this->input->post('kota'),
            'jurusan' => $this->input->post('jurusan'),
            'mulai' => $this->input->post('mulai'),
            'selesai' => $this->input->post('selesai'),
            'nilai' => $this->input->post('nilai'),

            'perusahaan' => $this->input->post('perusahaan'),
            'jenus' => $this->input->post('jenis'),
            'jabatan' => $this->input->post('jabatan'),
            'gaji' => $this->input->post('gaji'),
            'jabatan_atasan' => $this->input->post('atasan'),
            'berhenti' => $this->input->post('berhenti'),
            
            'deskripsi' => $this->input->post('deskripsi'),
        ];
        
        $this->fitur->insert($data);
        redirect('perusahaan/user/biodata/'.$this->input->post('user').'/'. encrypt_url($this->input->post('id')).'');
    }
    
    function change(){
        $this->load->model('personalia/Data/M_Data', 'data');
        $data = [
                'id_user' => $this->input->post('id'),
                'new' => md5($this->input->post('new'))
        ];
        $cek_password = $this->data->biodata_detail($data);
        if(md5($this->input->post('old')) == $cek_password[0]{'user_password'}){
            $this->session->set_flashdata(
                'notif',
                $this->data->notif($this->data->change($data),'simpan')
            );
        }else{
            $this->session->set_flashdata(
                'notif', 'sama'
            );
        }
        redirect('perusahaan/user/biodata/'.$this->input->post('user').'/'. encrypt_url($this->input->post('id')).'');
    }

    function reset($email,$id){
        $this->load->model('personalia/Data/M_Data', 'data');
        $char = 'qw0er1ty2ui3op4as5df6gh7jk8lz9xc0vbnm';
        $reset = '';
        for($n=0; $n<8; $n++){
            $reset.=$char[mt_rand(0, 36)];
        }
        $data = [
            'id_user' => decrypt_url($id),
            'password' => md5($reset)
        ];

        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol']= "smtp";
        $config['mailtype']= "html";
        $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
        $config['smtp_port']= "465";
        $config['smtp_user']= "kompasionteknologi19@gmail.com"; // isi dengan email kamu
        $config['smtp_pass']= "hcsihebat"; // isi dengan password kamu
        $config['crlf']="\r\n"; 
        $config['newline']="\r\n"; 
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);

        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject("Password Baru Anda");       
        $this->email->message(
        "Terimakasih telah melakukan kerja bersama kami.<br><br> Password Anda Telah Disetting ulang.<br> Dan ini adalah password baru anda <strong>".$reset."</strong><br> Dan Demi Keamanan kembali mohon ganti password anda kembali. <br> Terima Kasih"
        );
        if($this->email->send()){
            $this->data->change($data);
            $status = true;            
        }else{
            $status = false;
        }
        echo json_encode($status);
    }

    function delete(){
        $this->load->model('personalia/'.$this->input->post('fitur').'/M_'.$this->input->post('fitur').'', 'fitur');
        $data = [
            'user' => $this->input->post('user'),
            'id' => $this->input->post('id'),
            'key' => $this->input->post('key')
        ];
        $this->fitur->delete($data);
        redirect('perusahaan/user/biodata/'.$this->input->post('user').'/'. encrypt_url($this->input->post('id')).'');
    }
}
?>