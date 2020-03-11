<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class SanksiControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "sanksi";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('kpi/M_Sanksi', 'sanksi');
    }

    public function index(){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
        ];
        $data['data'] = $this->sanksi->sanksi($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/sanksi/sanksi');
        $this->load->view('template/footer');
    }

    function modal(){
        $data = [
            'id_sanksi' => $this->input->get('id')
        ];
        $data['data'] = $this->sanksi->sanksi_detail($data);
        $this->load->view('kpi/sanksi/modal/'.$this->input->get('menu').'',$data);
    }

    function insert(){
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'nama' => $this->input->post('nama'),
            'nilai' => $this->input->post('nilai'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->sanksi->insert($data);
        redirect('kpi/sanksi');
    }

    function delete(){
        $data = [
            'id_sanksi' => $this->input->post('id')
        ];
        $this->sanksi->delete($data);
        redirect('kpi/sanksi');
    }
}
?>