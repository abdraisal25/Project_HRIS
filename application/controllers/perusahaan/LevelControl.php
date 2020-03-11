<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LevelControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "level";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('perusahaan/M_Standart_Level', 'level');
    }

    public function standart_level(){
        $where = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->level->view_level($where);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/level/standart_level');
        $this->load->view('template/footer');
    }

    public function modal_level(){
        $where = [
            'id_standart_level' => $this->input->get('id')
        ];
        $data['data'] = $this->level->view_level_detail($where);
        if($this->input->get('menu') == "add"){
            $this->load->view('perusahaan/level/modal/add');
        }else if($this->input->get('menu') == "edit"){
            $this->load->view('perusahaan/level/modal/edit',$data);
        }else if($this->input->get('menu') == "delete"){
            $this->load->view('perusahaan/level/modal/delete',$data);
        }
    }

    function insert_level(){
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'nama' => $this->input->post('nama')
        ];
        $this->level->insert_level($data);
        redirect('perusahaan/level/standart_level');
    }
    
    function update_level(){
        $data = [
            'id_standart_level' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->level->update_level($data);
        redirect('perusahaan/level/standart_level');
    }

    function delete_level(){
        $data = [
            'id_standart_level' => $this->input->post('id')
        ];
        $this->level->delete_level($data);
        redirect('perusahaan/level/standart_level');
    }
}
?>