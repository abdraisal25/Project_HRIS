<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PositionControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "position";

    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('perusahaan/M_Position', 'position');
    }

    public function divisi(){
        $where = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->position->view_divisi($where);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/position/divisi/divisi');
        $this->load->view('template/footer');
    }

    public function modal_divisi(){
        $where = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'id_divisi' => $this->input->get('id')
        ];
        $data['data'] = $this->position->view_divisi_detail($where);
        // var_dump($data);
        // die();
        if($this->input->get('menu') == "add"){
            $this->load->view('perusahaan/position/divisi/modal/add',$data);
        }else if($this->input->get('menu') == "edit"){
            $this->load->view('perusahaan/position/divisi/modal/edit',$data);
        }else if($this->input->get('menu') == "delete"){
            $this->load->view('perusahaan/position/divisi/modal/delete',$data);
        }
    }

    function insert_divisi(){
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'nama' => $this->input->post('nama')
        ];
        $this->position->insert_divisi($data);
        redirect('perusahaan/position/divisi');
    }
    
    function update_divisi(){
        $data = [
            'id_divisi' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->position->update_divisi($data);
        redirect('perusahaan/position/divisi');
    }

    function delete_divisi(){
        $data = [
            'id_divisi' => $this->input->post('id')
        ];
        $this->position->delete_divisi($data);
        redirect('perusahaan/position/divisi');
    }

    public function departement(){
        $where = [
            'id_divisi' => $this->input->get('id')
        ];
        $data['id'] = $this->input->get('id');
        $data['nama'] = $this->input->get('nama');
        $data['data'] = $this->position->view_departement_member($where);
        $this->load->view('perusahaan/position/departement/departement',$data);
    }

    public function modal_departement(){
        $where = [
            'id_departement' => $this->input->get('id')
        ];
        $data['data'] = $this->position->view_departement_detail($where);
        $data['id'] = $this->input->get('divisi');
        if($this->input->get('menu') == "add"){
            $this->load->view('perusahaan/position/departement/modal/add',$data);
        }else if($this->input->get('menu') == "edit"){
            $this->load->view('perusahaan/position/departement/modal/edit',$data);
        }else if($this->input->get('menu') == "delete"){
            $this->load->view('perusahaan/position/departement/modal/delete',$data);
        }
    }

    function insert_departement(){
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'id_divisi' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->position->insert_departement($data);
        redirect('perusahaan/position/divisi#'.$this->input->post('id'));
    }

    function update_departement(){
        $data = [
            'id_departement' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->position->update_departement($data);
        redirect('perusahaan/position/divisi');
    }
    
    function delete_departement(){
        $data = [
            'id_departement' => $this->input->post('id')
        ];
        $this->position->delete_departement($data);
        redirect('perusahaan/position/divisi');
    }

}
?>