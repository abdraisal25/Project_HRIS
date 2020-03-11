<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class JabatanControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "jabatan";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('cit/perusahaan/M_Level', 'level');
        $this->load->model('cit/perusahaan/M_Divisi', 'divisi');
        $this->load->model('cit/perusahaan/M_Departement', 'departement');
        $this->load->model('perusahaan/M_Jabatan', 'jabatan');
    }

    public function jabatan(){
        $where = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
        ];
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['data'] = $this->jabatan->view_jabatan_full($where);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/jabatan/jabatan');
        $this->load->view('template/footer');
    }

    public function modal_jabatan(){
        $where = [
            'id_jabatan' => $this->input->get('id'),
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'id_jenus' => $this->session->userdata('id_jenus')
        ];
        $data['divisi'] = $this->divisi->select($where);
        $data['departement'] = $this->departement->select();
        $data['jabatan'] = $this->jabatan->select($where);
        $data['data'] = $this->jabatan->view_jabatan_detail($where);
        if($this->input->get('menu') == "add"){
            $this->load->view('perusahaan/jabatan/modal/add',$data);
        }else if($this->input->get('menu') == "delete"){
            $this->load->view('perusahaan/jabatan/modal/delete',$data);
        }
    }

    function insert_jabatan(){
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'jenus' => $this->session->userdata('id_jenus'),
            'divisi' => $this->input->post('divisi'),
            'departement' => $this->input->post('departement'),
            'parent' => $this->input->post('parent'),
            'jabatan' => $this->input->post('jabatan')
        ];
        if((int) $data['divisi'] == 0 || (int) $data['departement'] == 0 || (int) $data['parent'] == 0 || (int) $data['jabatan'] == 0){
            // var_dump($this->jabatan->new_jabatan($data));
            $this->session->set_flashdata(
                'notif',
                $this->jabatan->notif($this->jabatan->new_jabatan($data),'simpan')
            );
        }else{
            $this->session->set_flashdata(
                'notif',
                $this->jabatan->notif($this->jabatan->insert_jabatan($data),'simpan')
            );
        }
        redirect('perusahaan/jabatan/jabatan');
    }

    function delete_jabatan(){
        $data = [
            'id_jabatan' => $this->input->post('id')
        ];
        $this->session->set_flashdata(
            'notif',
            $this->jabatan->notif($this->jabatan->delete_jabatan($data),'hapus')
        );
        redirect('perusahaan/jabatan/jabatan');
    }

}
?>