<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class indexControl extends CI_Controller{
    
    var $menu = 0;
    var $sub_menu = NULL;

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $this->load->view('template/header',$data);
        $this->load->view('cit/template/menu');
        $this->load->view('cit/dashboard/dashboard');
        $this->load->view('template/footer');
    }

}
?>