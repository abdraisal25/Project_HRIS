<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WewenangControl extends CI_Controller{
    
    var $menu = 1;
    var $sub_menu = 'wewenang';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/jobdesc/M_Wewenang', 'wewenang');

    }

    public function index($id,$nama){
        $data = [
            'id' => decrypt_url($id),
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'nama' => decrypt_url($nama)
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->wewenang->view($data);
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/jobdesc/wewenang/wewenang');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'id' => $this->input->get('id'),
            'jabatan' => $this->input->get('jabatan'),
            'nama' => $this->input->get('nama')
        ];
        $data['data'] = $this->wewenang->view_detail($data);
        $this->load->view('cit/master/jobdesc/wewenang/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan')
        ];
        $this->wewenang->insert($data);
        redirect('lubangenak/perusahaan/jabatan/jobdesc/wewenang/'. encrypt_url($this->input->post('jabatan')).'&'.encrypt_url($this->input->post('judul')).'');
    }
   
    function delete(){
        $data = [
            'id_wewenang' => $this->input->post('id')
        ];
        $this->wewenang->delete($data);
        redirect('lubangenak/perusahaan/jabatan/jobdesc/wewenang/'. encrypt_url($this->input->post('jabatan')).'&'.encrypt_url($this->input->post('judul')).'');
    }
}
?>