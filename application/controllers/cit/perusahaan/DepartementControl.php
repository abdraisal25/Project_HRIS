<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartementControl extends CI_Controller{
    
    var $menu = 1;
    var $sub_menu = 'departement';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/perusahaan/M_Departement', 'departement');

    }

    public function index($id,$nama){
        $data = [
            'id_divisi' => decrypt_url($id),
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'nama' => decrypt_url($nama)
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->departement->view($data);
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/perusahaan/departement/departement');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'id' => $this->input->get('id'),
            'divisi' => $this->input->get('divisi'),
            'nama' => $this->input->get('nama')
        ];
        $data['data'] = $this->departement->view_detail($data);
        $this->load->view('cit/master/perusahaan/departement/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama'),
            'divisi' => $this->input->post('divisi')
        ];
        $this->departement->insert($data);
        redirect('lubangenak/perusahaan/departement/'. encrypt_url($this->input->post('divisi')).'&'.encrypt_url($this->input->post('judul')).'');
    }
    
    function update(){
        $data = [
            'id_departement' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->departement->update($data);
        redirect('lubangenak/perusahaan/departement/'. encrypt_url($this->input->post('divisi')).'&'.encrypt_url($this->input->post('judul')).'');
    }
   
    function delete(){
        $data = [
            'id_departement' => $this->input->post('id')
        ];
        $this->departement->delete($data);
        redirect('lubangenak/perusahaan/departement/'. encrypt_url($this->input->post('divisi')).'&'.encrypt_url($this->input->post('judul')).'');
    }
}
?>