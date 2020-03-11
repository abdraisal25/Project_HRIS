<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class TasklistControl extends CI_Controller{

    var $menu = 2;
    var $sub_menu = "tasklist";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('kpi/M_Tasklist', 'tasklist');
    }

    public function member($nama,$id){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'nama' => rawurldecode($nama),
            'id_user' => decrypt_url($id),
            // 'output' => date('F Y'),
            'output' => 'April 2020',
            'level' => decrypt_url($id) == $this->session->userdata('id_user') ? 1 : 0 
        ];
        $data['data'] = $this->tasklist->tasklist($data);
        // echo '<pre>';
        // var_dump($data);
        // die();
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/tasklist/tasklist');
        $this->load->view('template/footer');
    }

    public function view_progress($id){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'tasklist' => decrypt_url($id)
        ];
        $data['data'] = $this->tasklist->view_progress($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/tasklist/progress');
        $this->load->view('template/footer');
    }

    function modal(){
        $data = [
            'id_tasklist' => $this->input->get('tasklist'),
            'id_user' => $this->input->get('id'),
            'nama' => $this->input->get('nama')
        ];
        $data['data'] = $this->tasklist->tasklist_detail($data);
        $this->load->view('kpi/tasklist/modal/'.$this->input->get('menu').'',$data);
    }

    function insert(){
        $data = [
            'id_user' => $this->input->post('user'),
            'tasklist' => $this->input->post('tasklist'),
            'bobot' => $this->input->post('bobot'),
            'catatan' => $this->input->post('catatan'),
            'status' => "Belum Selesai",
            'by' => $this->session->userdata('nama_user'),
            'at' => date('d F Y'),
            'output' => date('F Y', strtotime('+1 month', strtotime(date('F Y'))))
        ];
        $this->tasklist->insert($data);
        redirect('kpi/tasklist/'.$this->input->post('nama').'/'. encrypt_url($this->input->post('user')).'');
    }

    function progress(){
        $data = [
            'tasklist' => $this->input->post('tasklist'),
            'progress' => $this->input->post('progress'),
            'date' => date('d F Y'),
            'catatan' => $this->input->post('catatan'),
            'by' => $this->session->userdata('nama_user'),
            'status' => $this->input->post('status'),
            'done' => date('F Y')
        ];
        if($this->input->post('status') == 'Selesai'){
            $this->tasklist->done($data);
        }
        $this->tasklist->progress($data);
        redirect('kpi/tasklist/'.$this->input->post('nama').'/'. encrypt_url($this->input->post('user')).'');
    }

    function delete(){
        $data = [
            'tasklist' => $this->input->post('tasklist')
        ];
        $this->tasklist->delete($data);
        redirect('kpi/tasklist/'.$this->input->post('nama').'/'. encrypt_url($this->input->post('user')).'');
    }
}
?>