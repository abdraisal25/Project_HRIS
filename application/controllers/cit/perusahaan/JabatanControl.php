<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanControl extends CI_Controller{
    
    var $menu = 1;
    var $sub_menu = 'jabatan';

    function __construct(){
        parent::__construct();
        $this->load->model('cit/perusahaan/M_Departement', 'departement');
        $this->load->model('cit/perusahaan/M_Jabatan', 'jabatan');
        $this->load->model('cit/perusahaan/M_Jenis', 'jenis');
        $this->load->model('cit/perusahaan/M_Level', 'level');


    }

    public function index($id,$nama){
        $data = [
            'id_departement' => decrypt_url($id),
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'nama' => decrypt_url($nama)
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->jabatan->view($data);
        // echo '<pre>';
        // var_dump($data['data'][0]{'id_jenus'});
        // die();
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/master/perusahaan/jabatan/jabatan');
        $this->load->view('template/footer');
    }

    public function modal(){
        $data = [
            'id' => $this->input->get('id'),
            'departement' => $this->input->get('departement'),
            'nama' => $this->input->get('nama')
        ];

        $jenus = $this->departement->view_detail(array('id' => $this->input->get('departement')));
        $data['parent'] = $this->jenis->select($jenus[0]{'id_jenus'});
        $data['level'] = $this->level->view(array('id_jenus' => $jenus[0]{'id_jenus'}));
        $data['data'] = $this->jabatan->view_detail($data);
        // echo '<pre>';
        // var_dump($jenus[0]{'id_jenus'});
        // die();
        $this->load->view('cit/master/perusahaan/jabatan/modal/'.$this->input->get('menu').'',$data);
    }
        
    function insert(){
        $data = [
            'nama' => $this->input->post('nama'),
            'parent' => $this->input->post('parent'),
            'departement' => $this->input->post('departement')
        ];
        $this->jabatan->insert($data);
        redirect('lubangenak/perusahaan/jabatan/'. encrypt_url($this->input->post('departement')).'&'.encrypt_url($this->input->post('judul')).'');
    }
    
    function update(){
        $data = [
            'id_jabatan' => $this->input->post('id'),
            'nama' => $this->input->post('nama')
        ];
        $this->jabatan->update($data);
        redirect('lubangenak/perusahaan/jabatan/'. encrypt_url($this->input->post('departement')).'&'.encrypt_url($this->input->post('judul')).'');
    }
   
    function delete(){
        $data = [
            'id_jabatan' => $this->input->post('id')
        ];
        $this->jabatan->delete($data);
        redirect('lubangenak/perusahaan/jabatan/'. encrypt_url($this->input->post('departement')).'&'.encrypt_url($this->input->post('judul')).'');
    }
}
?>