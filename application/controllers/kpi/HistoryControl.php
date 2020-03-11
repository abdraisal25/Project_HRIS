<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class HistoryControl extends CI_Controller{

    var $menu = 2;
    var $sub_menu = "history";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('kpi/M_History', 'history');
        $this->load->model('kpi/M_Individu', 'individu');
    }

    public function index(){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'member_user' => $this->history->member_user(array('id_jabatan' => $this->session->userdata('jabatan')[0]['id_jabatan'], 'id_perusahaan' => $this->session->userdata('id_perusahaan'))),
            'corporate' => $this->individu->view_corporate(array('id_user' => $this->session->userdata('id_user'), 'output' => date('F Y')))
        ];
        if(!empty($data['member_user'])){
            $this->load->view('template/header',$data);
            $this->load->view('template/menu');
            $this->load->view('kpi/history/history');
            $this->load->view('template/footer');
        }else{
            redirect('kpi/history/'.$this->session->userdata('nama_user').'/'. encrypt_url($this->session->userdata('id_user')).'');
        }
    }

    public function member($nama,$id){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'nama' => rawurldecode($nama),
            'id_user' => decrypt_url($id)
        ];
        $data['data'] = $this->history->history_user($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/history/list');
        $this->load->view('template/footer');
    }

    public function graph($nama,$tahun,$id){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'tahun' => $tahun,
            'nama' => rawurldecode($nama),
            'id_user' => decrypt_url($id),
        ];
        $data['data'] = $this->history->view_history($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/history/tahun');
        $this->load->view('template/footer');
    }

    public function month($nama,$id,$periode){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'output' => rawurldecode($periode),
            'nama' => rawurldecode($nama),
            'id_user' => decrypt_url($id),
        ];
        $data['data'] = $this->individu->scroring($data);

        // $data['corporate'] = $this->nilai_corporate($this->individu->corporate($data));
        // $data['tasklist'] = $this->individu->tasklist($data);
        // $data['sanksi'] = $this->individu->sanksi($data);
        // $data['total'] = $this->total_nilai($data['corporate'],$data['tasklist'],$data['sanksi']);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/individu/list');
        $this->load->view('template/footer');
    }
     
    function nilai_corporate($data){
        $indicator = $this->individu->indicator_persentase();       
        $arr = [];
        $kategori_nilai = [];
        foreach ($data as $index => $n) {
            $arr[$index] = $n;
            if($n{'nilai_jenis'} == "Persentase"){
                $nilai = $n{'corporate_tercapai'} / $n{'corporate_target'} * 100;
            }else{
                $nilai = (int) $n{'corporate_tercapai'};
            }
            for($i= 4; $i <= 13; $i++){
                if(!empty($n{'nilai_'.$i})){
                    if($n{'nilai_'.$i} < $n{'nilai_10'}){
                        $persentase = ($n{'corporate_tercapai'} / $n{'corporate_target'}) * 100;
                        break;
                    }else if($n{'nilai_'.$i} > $n{'nilai_10'}){
                        if($n{'corporate_target'} != 0){
                            $persentase = ($n{'corporate_target'} - ($n{'corporate_tercapai'} - $n{'corporate_target'})) / $n{'corporate_target'} * 100;
                        }else{
                            $persentase = 0;
                        }
                        break;
                    }
                }
            }
            foreach ($n as $index_nilai => $value2) {
                if (strpos($index_nilai, 'nilai_') !== FALSE) {
                    if ($value2 != "") {
                        $kategori_nilai[$index][ str_replace('nilai_', '', $index_nilai)] = $value2;
                    }
                }
            }
            unset($kategori_nilai[$index]["jenis"]);
            arsort($kategori_nilai[$index]);
            
            foreach ($kategori_nilai[$index] as $standart => $x) {
                if($nilai >= $x){
                    break;
                }
            }
            
            $total = $standart * $n{'corporate_bobot'};
            for($w = 0; $w < count($indicator); $w++){
                if(!empty($indicator[$w]{'persentase_akhir'})){
                    if($persentase >= $indicator[$w]{'persentase_awal'} && $persentase <= $indicator[$w]{'persentase_akhir'}){
                    $warna = $indicator[$w]{'persentase_indikator'};
                        break;
                    }
                }else if($persentase >= $indicator[$w]{'persentase_awal'}){
                    $warna = $indicator[$w]{'persentase_indikator'};
                    break;
                }
            }
            $arr[$index]{'color'} = $warna;
            $arr[$index]{'persentase'} = round($persentase);
            $arr[$index]{'nilai'} = $total;
        }
        return $arr;
    }
    
    function total_nilai($corporate,$tasklist,$sanksi){
        $indicator = $this->individu->indicator_kpi();
        
        $total_corporate = 0;
        $total_tasklist = 0;
        foreach($corporate as $n){
            $total_corporate += $n{'nilai'};
        }
        foreach($tasklist as $n){
            $total_tasklist += $n{'tasklist_bobot'};
        }
        $total_seluruh = $total_corporate + $total_tasklist - (!empty($sanksi) ? $sanksi[0]{'sanksi_nilai'} : 0);
        
        for($i = 0; $i < 6;$i++){
            if(!empty($indicator[$i]{'indikator_akhir'})){
                if($total_seluruh >= $indicator[$i]{'indikator_awal'} && $total_seluruh <= $indicator[$i]{'indikator_akhir'} ){
                    $warna = $indicator[$i]{'indikator_terminologi'};
                    $terminologi = $indicator[$i]{'indikator_nama'};
                    break;
                }
            }else if($total_seluruh >= $indicator[$i]{'indikator_awal'}){
                $warna = $indicator[$i]{'indikator_terminologi'};
                $terminologi = $indicator[$i]{'indikator_nama'};
                break;
            }
        }
        $arr = [
            'total' => $total_seluruh,
            'warna' => $warna,
            'terminologi' => $terminologi
        ];
        return $arr;
    }
}
?>