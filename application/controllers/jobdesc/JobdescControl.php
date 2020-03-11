<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobdescControl extends CI_Controller{

    var $menu = 1;
    var $sub_menu = "jabatan";
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('jobdesc/M_Jobdesc', 'jobdesc');
    }

    public function jobdesc($nama,$key){
        $data = [
            'key' => decrypt_url($key)
        ];
        $data['id_jabatan'] = $this->jobdesc->view_jabatan($data);
        $data['data'] = $this->jobdesc->view_jobdesc($data);
        $data['nama'] = rawurldecode($nama);
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        // echo '<pre>';
        // var_dump($data);
        // die();
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('perusahaan/jabatan/jobdesc/jobdesc',$data);
        $this->load->view('template/footer');

    }

    public function modal_jobdesc(){
        $this->load->model('jobdesc/'.$this->input->get('jobdesc').'/M_'.$this->input->get('jobdesc').'', 'fitur');
        $data = [
            'nama' => $this->input->get('nama'),
            'id' => $this->input->get('id'),
            'key' => $this->input->get('key'),
            'fitur' => $this->input->get('jobdesc'),
            'jabatan' => $this->input->get('jabatan')
        ];
        $data['data'] = $this->fitur->view_detail($data);
        if($this->input->get('jobdesc') == "umum"){
            $data['select_umum'] = $this->fitur->view_data($data);
        }
        // echo '<pre>';
        // var_dump($data);
        // die();
        $this->load->view('perusahaan/jabatan/jobdesc/modal_'.$this->input->get('jobdesc').'/'.$this->input->get('menu').'',$data);
    }

    function insert_jobdesc(){
        $this->load->model('jobdesc/'.$this->input->post('jobdesc').'/M_'.$this->input->post('jobdesc').'', 'fitur');
        $data = [
            'key_jabatan' => $this->input->post('key'),
            'tujuan' => $this->input->post('tujuan'),
            'wewenang' => $this->input->post('wewenang'),
            'periode' => $this->input->post('periode'),
            'hasil' => $this->input->post('hasil'),
            'umum' => $this->input->post('umum'),
            'khusus' => $this->input->post('khusus')
        ];
        // echo '<pre>';
        // var_dump($data);
        // die();
        $this->fitur->insert($data);
        redirect('perusahaan/jabatan/jobdesc/'.$this->input->post('nama').'/'.encrypt_url($this->input->post('key')).'');
    }
    
    function update_jobdesc(){
        $this->load->model('jobdesc/'.$this->input->post('jobdesc').'/M_'.$this->input->post('jobdesc').'', 'fitur');
        $data = [
            'id' => $this->input->post('id'),
            'tujuan' => $this->input->post('tujuan'),
            'wewenang' => $this->input->post('wewenang'),
            'periode' => $this->input->post('periode'),
            'hasil' => $this->input->post('hasil')
        ];
        $this->fitur->update($data);
        redirect('perusahaan/jabatan/jabatan');
    }

    function delete_jobdesc(){
        $this->load->model('jobdesc/'.$this->input->post('jobdesc').'/M_'.$this->input->post('jobdesc').'', 'fitur');
        $data = [
            'id' => $this->input->post('id')
        ];
        $this->fitur->delete($data);
        redirect('perusahaan/jabatan/jobdesc/'.$this->input->post('nama').'/'.encrypt_url($this->input->post('key')).'');
    }
}
?>