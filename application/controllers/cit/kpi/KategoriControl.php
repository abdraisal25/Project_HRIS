<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriControl extends CI_Controller{
    
    var $menu = 2;
    var $sub_menu = 'kategori';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/kpi/M_Kategori', 'kategori');
        $this->load->model('cit/perusahaan/M_Jenis', 'jenis');
    }

    public function index(){
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->kategori->view();
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/kpi/kategori/kategori');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'id' => $this->input->get('id'),
            'jenus' => $this->jenis->view()
        ];
        $data['data'] = $this->kategori->view_detail($data);
        $this->load->view('cit/master/kpi/kategori/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama')
        ];
        $this->kategori->insert($data);
        redirect('lubangenak/kpi/kategori');
    }
    
    function update(){
        $data = [
            'id_kategori' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->kategori->update($data);
        redirect('lubangenak/kpi/kategori');
    }
   
    function delete(){
        $data = [
            'id_kategori' => $this->input->post('id')
        ];
        $this->kategori->delete($data);
        redirect('lubangenak/kpi/kategori');
    }
}
?>