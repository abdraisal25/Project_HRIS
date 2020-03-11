<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class AdminControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "admin";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('personalia/M_Personalia', 'personalia');
        $this->load->model('perusahaan/admin/M_Admin', 'admin');
        $this->load->model('perusahaan/M_Jabatan', 'jabatan');
        $this->load->model('cit/perusahaan/M_Level', 'level');
    }

    public function index(){
        $level = $this->level->view(array('id_jenus'=>$this->session->userdata('id_jenus')));
        $where = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'id_jenus' => $this->session->userdata('id_jenus'),
            'level' => $level[5]{'id_level'}
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->admin->admin_departement($where);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/jabatan/admin/admin');
        $this->load->view('template/footer');
    }

    public function member($key,$nama){
        $data = [
            'key' => decrypt_url($key),
            'nama' => decrypt_url($nama)
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->admin->member($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/jabatan/admin/member');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'key' => $this->input->get('id'),
        ];
        $this->load->view('perusahaan/jabatan/admin/modal/akun',$data);
    }

    
    function create(){
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'key' => $this->input->post('key'),
            'email' => $this->input->post('email'),
            'status' => 0
        ];
        $cek_email = $this->personalia->cek_akun($data);
        if(count($cek_email) < 1){
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
            $this->email->to($this->input->post('email'));
            $this->email->subject("User Registrasion");
            $id = $this->personalia->create($data);
            $link = site_url('registrasi/user/'.encrypt_url($id));
            $this->email->message(
            "Terimakasih telah melakukan kerja bersama kami.<br><br> Untuk membuat akun pribadi anda silahkan Klik <a href=".$link.">DISNI</a>"
            );
            $this->email->send();
            $status = true;            
        }else{
            $status = false;
        } 
        echo json_encode($status);    
    }
    
    function insert_data(){
        $this->load->model('perusahaan/user/'.$this->input->POST('personal').'/M_'.$this->input->post('personal').'', 'fitur');
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'id_jabatan' => $this->input->post('id'),
            'nip' => $this->input->post('nip'),
            'ktp' => $this->input->post('ktp'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'jekel' => $this->input->post('jekel'),
            'darah' => $this->input->post('darah'),
            'tpt_lahir' => $this->input->post('tpt_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'agama' => $this->input->post('agama'),
            'perkawinan' => $this->input->post('perkawinan'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp')
        ];
        $this->fitur->insert_data($data);
        redirect('perusahaan/user/member/'.$this->input->post('id'));
    }

    function update_data(){
        $data = [
            'id_data' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->admin->update_data($data);
        redirect('perusahaan/admin/divisi');
    }
    
    function delete_data(){
        $data = [
            'id_data' => $this->input->post('id')
        ];
        $this->admin->delete_data($data);
        redirect('perusahaan/admin/divisi');
    }
}
?>