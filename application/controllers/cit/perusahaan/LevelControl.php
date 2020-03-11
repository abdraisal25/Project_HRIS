<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LevelControl extends CI_Controller{
    
    var $menu = 1;
    var $sub_menu = 'level';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/perusahaan/M_Level', 'level');

    }

    public function index($id,$nama){
        $data = [
            'id_jenus' => decrypt_url($id),
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'nama' => decrypt_url($nama)
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->level->view($data);
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/perusahaan/level/level');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'id' => $this->input->get('id'),
            'jenus' => $this->input->get('jenus'),
            'nama' => $this->input->get('nama')
        ];
        $data['data'] = $this->level->view_detail($data);
        $this->load->view('cit/master/perusahaan/level/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama'),
            'jenus' => $this->input->post('jenus')
        ];
        $this->level->insert($data);
        redirect('lubangenak/perusahaan/level/'. encrypt_url($this->input->post('jenus')).'&'.encrypt_url($this->input->post('judul')).'');
    }
    
    function update(){
        $data = [
            'id_level' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->level->update($data);
        redirect('lubangenak/perusahaan/level/'. encrypt_url($this->input->post('jenus')).'&'.encrypt_url($this->input->post('judul')).'');

    }
   
    function delete(){
        $data = [
            'id_level' => $this->input->post('id')
        ];
        $this->level->delete($data);
        redirect('lubangenak/perusahaan/level/'. encrypt_url($this->input->post('jenus')).'&'.encrypt_url($this->input->post('judul')).'');
    }
}
?>