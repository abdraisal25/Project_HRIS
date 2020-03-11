<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexControl extends CI_Controller{
    
    var $menu = 0;
    var $sub_menu = NULL;

    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('kpi/M_Corporate', 'corporate');
        $this->load->model('kpi/M_Tasklist', 'tasklist');
        $this->load->model('kpi/M_Individu', 'individu');
        $this->load->model('kpi/M_History', 'history');        
    }

    public function index(){
        $data = [
            'output' => date('F Y'),
            'id_user' => $this->session->userdata('id_user'),
            'tahun' => date('Y')
        ];
        $data['corporate'] = count($this->corporate->view_corporate($data));
        $data['tasklist'] =  count($this->tasklist->tasklist_pending($data));
        $data['score'] = $this->individu->scroring($data);
        $data['data'] = $this->history->view_history($data);
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('dashboard/dashboard');
        $this->load->view('template/footer');
    }

}
?>