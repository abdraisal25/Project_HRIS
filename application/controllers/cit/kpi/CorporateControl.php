<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CorporateControl extends CI_Controller{
    
    var $menu = 2;
    var $sub_menu = 'corporate';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/kpi/M_Corporate', 'corporate');

    }

    public function index($id,$nama){
        $data = [
            'id' => decrypt_url($id),
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'jenus' => decrypt_url($nama)
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->corporate->view($data);
        // echo '<pre>';
        // var_dump($data);
        // die();
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/kpi/corporate/corporate');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'id' => $this->input->get('id'),
            'kategori' => $this->input->get('kategori'),
            'nama' => $this->input->get('nama')
        ];
        $data['data'] = $this->corporate->view_detail($data);
        $this->load->view('cit/master/kpi/corporate/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama'),
            'jenus' => $this->input->post('judul'),
            'kategori' => $this->input->post('kategori')
        ];
        $this->corporate->insert($data);
        redirect('lubangenak/kpi/corporate/'. encrypt_url($this->input->post('kategori')).'&'.encrypt_url($this->input->post('judul')).'');
    }
    
    function update(){
        $data = [
            'id_corporate' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->corporate->update($data);
        redirect('lubangenak/kpi/corporate/'. encrypt_url($this->input->post('kategori')).'&'.encrypt_url($this->input->post('judul')).'');

    }
   
    function delete(){
        $data = [
            'id_corporate' => $this->input->post('id')
        ];
        $this->corporate->delete($data);
        redirect('lubangenak/kpi/corporate/'. encrypt_url($this->input->post('kategori')).'&'.encrypt_url($this->input->post('judul')).'');
    }
}
?>