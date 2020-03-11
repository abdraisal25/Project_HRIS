<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DivisiControl extends CI_Controller{
    
    var $menu = 1;
    var $sub_menu = 'divisi';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/perusahaan/M_Divisi', 'divisi');

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
        $data['data'] = $this->divisi->view($data);
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/perusahaan/divisi/divisi');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'id' => $this->input->get('id'),
            'jenus' => $this->input->get('jenus'),
            'nama' => $this->input->get('nama')
        ];
        $data['data'] = $this->divisi->view_detail($data);
        $this->load->view('cit/master/perusahaan/divisi/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama'),
            'jenus' => $this->input->post('jenus')
        ];
        $this->session->set_flashdata(
            'notif',
            $this->divisi->notif($this->divisi->insert($data),'simpan')
        );
        redirect('lubangenak/perusahaan/divisi/'. encrypt_url($this->input->post('jenus')).'&'.encrypt_url($this->input->post('judul')).'');
    }
    
    function update(){
        $data = [
            'id_divisi' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->session->set_flashdata(
            'notif',
            $this->divisi->notif($this->divisi->update($data),'simpan')
        );
        redirect('lubangenak/perusahaan/divisi/'. encrypt_url($this->input->post('jenus')).'&'.encrypt_url($this->input->post('judul')).'');
    }
   
    function delete(){
        $data = [
            'id_divisi' => $this->input->post('id')
        ];
        $this->session->set_flashdata(
            'notif',
            $this->divisi->notif($this->divisi->delete($data),'hapus')
        );
        redirect('lubangenak/perusahaan/divisi/'. encrypt_url($this->input->post('jenus')).'&'.encrypt_url($this->input->post('judul')).'');
    }
}
?>