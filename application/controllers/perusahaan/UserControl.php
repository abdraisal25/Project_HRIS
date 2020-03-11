<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class UserControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "admin";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('perusahaan/M_Jabatan', 'jabatan');
        $this->load->model('personalia/M_Personalia', 'personalia');
    }

    public function index(){
        $where = [
            'id_level' => $this->session->userdata('jabatan')[0]['id_level'],
            'id_departement' => $this->session->userdata('jabatan')[0]['id_departement'],
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->personalia->view_member($where);
        // echo '<pre>';
        // var_dump($data['data']);
        // die();
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/jabatan/admin/member_departement');
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
    
    // public function user($id){
    //     $where = [
    //         'id_jabatan' => $id
    //     ];
    //     $data['menu'] = $this->menu;
    //     $data['sub_menu'] = $this->sub_menu;
    //     $data['id'] = $id;
    //     $data['data'] = $this->admin->admin_user($where);
    //     $data['jabatan'] = $this->jabatan->view_jabatan_detail($where);
    //     $this->load->view('template/header',$data);
    //     $this->load->view('template/menu');
    //     $this->load->view('perusahaan/jabatan/admin/admin_member');
    //     $this->load->view('template/footer');
    // }

    public function modal(){
        $data = [
            'id_level' => $this->session->userdata('jabatan')[0]['id_level'],
            'id_departement' => $this->session->userdata('jabatan')[0]['id_departement'],
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
        ];
        $data['jabatan'] = $this->jabatan->select_jabatan($data);
        $this->load->view('perusahaan/jabatan/admin/modal/add',$data);
    }

    
    function create(){
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'key' => $this->input->post('jabatan'),
            'email' => $this->input->post('email'),
            'status' => 0
        ];
        if(empty($this->personalia->cek_akun($data))){
            $id = $this->personalia->create($data);
            if($id != NULL){
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
        
                $link = site_url('registrasi/user/'.encrypt_url($id));
                $this->email->message(
                "Terimakasih telah melakukan kerja bersama kami.<br><br> Untuk membuat akun pribadi anda silahkan Klik <a href=".$link.">DISNI</a>"
                );
                if($this->email->send()){
                    redirect('perusahaan/user');
                }else{
                    var_dump($this->email->print_debugger(array('headers')));
                }
            }
        }else{
            redirect('perusahaan/user');
        }

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
        echo '<pre>';
        var_dump($data);
        die();
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