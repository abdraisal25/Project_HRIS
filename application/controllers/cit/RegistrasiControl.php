<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrasiControl extends CI_Controller{
    
    var $menu = 1;
    var $sub_menu = 'registrasi';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/registrasi/M_Registrasi', 'registrasi');
        $this->load->model('cit/perusahaan/M_Jenis', 'jenis');
    }

    public function index(){
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->registrasi->view();
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/registrasi/registrasi');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data['jenus'] = $this->jenis->view();
        $this->load->view('cit/registrasi/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $config['file_name'] = $this->input->post('nama'); //nama yang terupload nantinya
		$config['upload_path'] = 'assets/images/perusahaan/'; //path folder
        $config['allowed_types'] = '*'; //type yang dapat diakses bisa anda sesuaikan
        $this->upload->initialize($config);
        
        $cek_email = $this->registrasi->cek_email($this->input->post('email'));
        if($cek_email['error'] == true){  
            if ($this->upload->do_upload('logo')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='assets/images/perusahaan/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= 'assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $data = array(
                    'email' => $this->input->post('email'),
                    'jenis' => $this->input->post('jenis'),
                    'nama' => $this->input->post('nama'),
                    'telp' => $this->input->post('telp'),
                    'alamat' => $this->input->post('alamat'),
                    'status' => 0,
                    'logo' => $gbr['file_name']
                );
            }
            // $config = array();
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
            
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($this->input->post('email'));
            $this->email->subject("Company Registrasion");
            
            $verif = $this->registrasi->insert($data);
            $link = site_url('registrasi/'.encrypt_url($verif));
            $this->email->message(
            "Terimakasih telah melakukan kerja bersama kami.<br><br> Untuk membuat akun perusahaan anda silahkan Klik <a href=".$link.">DISNI</a> "
            );
            $this->email->send();
            $status = true;
        }else{
            $status = false;
        }
        echo json_encode($status);    
        // redirect('lubangenak/registrasi');
    }
}
?>