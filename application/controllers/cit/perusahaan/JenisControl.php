<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisControl extends CI_Controller{
    
    var $menu = 1;
    var $sub_menu = 'jenis';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/perusahaan/M_Jenis', 'jenis');

    }

    public function index(){
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->jenis->view();
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/perusahaan/jenis/jenis');
        $this->load->view('template/footer');
    }

    public function modal(){
        $where = [
            'id' => $this->input->get('id')
        ];

        $data['data'] = $this->jenis->view_detail($where);
        $this->load->view('cit/master/perusahaan/jenis/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama')
        ];
        $this->session->set_flashdata(
            'notif',
            $this->jenis->notif($this->jenis->insert($data),'simpan')
        );
        redirect('lubangenak/perusahaan/jenis');
    }
    
    function update(){
        $data = [
            'id_jenus' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->session->set_flashdata(
            'notif',
            $this->jenis->notif($this->jenis->update($data),'simpan')
        );
        redirect('lubangenak/perusahaan/jenis');
    }
   
    function delete(){
        $data = [
            'id_jenus' => $this->input->post('id')
        ];
        $this->session->set_flashdata(
            'notif',
            $this->jenis->notif($this->jenis->delete($data),'hapus')
        );
        redirect('lubangenak/perusahaan/jenis');
    }
}
?>