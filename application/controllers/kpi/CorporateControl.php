<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class CorporateControl extends CI_Controller{

    var $menu = 2;
    var $sub_menu = "corporate";
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login" ){
            redirect(base_url("login/perusahaan"));
        }
        $this->load->model('kpi/M_Corporate', 'corporate');
    }

    public function index(){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'corporate' => $this->corporate->view_corporate(array('id_user' => $this->session->userdata('id_user'), 'output' => date('F Y'))),
            'member_user' => $this->corporate->member_user(array('id_jabatan' => $this->session->userdata('jabatan')[0]['id_jabatan'], 'id_perusahaan' => $this->session->userdata('id_perusahaan')))
        ];

        if(!empty($data['member_user'])){
            $this->load->view('template/header',$data);
            $this->load->view('template/menu');
            $this->load->view('kpi/corporate/corporate');
            $this->load->view('template/footer');
        }else{
            redirect('kpi/corporate/'.$this->session->userdata('nama_user').'/'. encrypt_url($this->session->userdata('id_user')).''); 
        }
    }

    public function member($nama,$id){
        $arr = [];
        $start    = decrypt_url($id) == $this->session->userdata('id_user') ? new DateTime() : (new DateTime())->add(new DateInterval('P1M'));
        $end = (new DateTime($start->format('Y-m-d')))->add(new DateInterval('P1Y'));
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);
        foreach ($period as $dt) {
            $arr[]{'periode'} = $dt->format("F Y");
        }
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'nama' => rawurldecode($nama),
            'output' => 'April 2020', 
            // 'output' => decrypt_url($id) == $this->session->userdata('id_user') ? date('F Y') : date('F Y', strtotime('+1 month', strtotime(date('F Y')))), 
            'id_user' => decrypt_url($id),
            'level' => decrypt_url($id) == $this->session->userdata('id_user') ? 1 : 0,
            'date' => $arr
        ];
        $data['data'] = $this->corporate->view_corporate($data);
        $data['bobot'] = $this->bobot($data['data'],0);
        $data['sanksi'] = $this->corporate->view_sanksi($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/corporate/list');
        $this->load->view('template/footer');
    }

    function month(){
        $where = [
            'id_user' => $this->input->get('user'),
            'output' => $this->input->get('periode'),
            'level' => $this->input->get('user') == $this->session->userdata('id_user') ? 1 : 0,
        ];
        $data = $this->corporate->view_corporate($where);
        $link = [];
        foreach($data as $index => $n){
            $link[$index] = encrypt_url($n{'key_corporate'});
        }
        $response = [
            'data' => $data,
            'output' => ($where['level'] == 1 ? date('F Y') : date('F Y', strtotime('+1 month', strtotime(date('F Y'))))) == $where['output'] ? 1 : 0,
            'level' => $where['level'],
            'link' => $link,
            'bobot' => $this->bobot($data,0)
        ];
        echo json_encode($response);
    }

    public function view_progress($id){
        $data = [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'key' => decrypt_url($id),
            'graph' => $this->graph(decrypt_url($id)),
        ];
        $data['data'] = $this->corporate->view_progress($data);
        $this->load->view('template/header',$data);
        $this->load->view('template/menu');
        $this->load->view('kpi/corporate/progress');
        $this->load->view('template/footer');
    }
    
    public function modal(){
        $data = [
            'sanksi' => $this->corporate->sanksi(array('id_perusahaan' => $this->session->userdata('id_perusahaan'))),
            'kategori' => $this->corporate->kategori(),
            'perspektife' => $this->corporate->perspektife(array('id_jenus' => $this->session->userdata('id_jenus'))),
            'id_user' => $this->input->get('id'),
            'nama' => $this->input->get('nama'),
            'output' => date('F Y', strtotime('+1 month', strtotime(date('F Y')))), 
            'key' => $this->input->get('corporate'),
            'id_sanksi' => $this->input->get('sanksi'),
            'fitur' => $this->input->get('fitur')
        ];
        $data['sanksi_member'] = $this->corporate->view_sanksi_member($data);
        $data['data'] = $this->corporate->corporate_detail($data);
        if(!empty($data['data'])){
            $data['tips'] = $this->tips($data['data']);
        }
        $this->load->view('kpi/corporate/modal/'.$this->input->get('menu'),$data);
    }

    function insert(){
        if((int) $this->input->post('perspektife') == 0){
            $perspektife = $this->corporate->add_corporate(array('jenus' => $this->session->userdata('id_jenus'), 'nama' => $this->input->post('perspektife'),'kategori' => $this->input->post('kategori')));
        }else{
            $perspektife = $this->input->post('perspektife');
        }
        $data = [
            'id_perusahaan' => $this->session->userdata('id_perusahaan'),
            'id_perspektife' => $perspektife,
            'id_user' => $this->input->post('user'),
            'target' => $this->input->post('target'),
            'satuan' => $this->input->post('satuan'),
            'bobot' => $this->input->post('bobot'),
            'keterangan' => $this->input->post('keterangan'),
            'by' => $this->session->userdata('nama_user'),
            'at' => date('d F Y'),
            // 'output' => date('F Y', strtotime('+1 month', strtotime(date('F Y')))),
            'output' => $this->input->post('output'),
        
            'penilaian' => $this->input->post('penilaian'), 
            'n1' => $this->input->post('n1'), 
            'n2' => $this->input->post('n2'), 
            'n3' => $this->input->post('n3'), 
            'n4' => $this->input->post('n4'), 
            'n5' => $this->input->post('n5'), 
            'n6' => $this->input->post('n6'), 
            'n7' => $this->input->post('n7'), 
            'n8' => $this->input->post('n8'), 
            'n9' => $this->input->post('n9'), 
            'n10' => $this->input->post('n10'), 
        ];
        if($this->corporate->view_corporate($data) == null && $data['bobot'] <= 100){
            $this->session->set_flashdata(
                'notif',
                $this->corporate->notif($this->corporate->insert($data),'simpan')
            );
        }else if($this->bobot($this->corporate->view_corporate($data),$data['bobot']) <= 100){
            $this->session->set_flashdata(
                'notif',
                $this->corporate->notif($this->corporate->insert($data),'simpan')
            );
        }else{
            $this->session->set_flashdata(
                'notif','full'
            );
        }
        redirect('kpi/corporate/'.$this->input->post('nama').'/'. encrypt_url($this->input->post('user')).'');
    }

    function sanksi(){
        $data = [
            'sanksi' => $this->input->post('sanksi'),
            'id_user' => $this->input->post('user'),
            'catatan' => $this->input->post('catatan'),
            'by' => $this->session->userdata('nama_user'),
            'at' => date('d F Y'),
            'output' => date('F Y', strtotime('+1 month', strtotime(date('F Y'))))
        ];
        $this->corporate->sanksi_member($data);
        redirect('kpi/corporate/'.$this->input->post('nama').'/'. encrypt_url($this->input->post('user')).'');
    }

    function progress(){
        $tercapai = $this->corporate->corporate_detail(array('key' => $this->input->post('corporate')));
        $data = [
            'key' => $this->input->post('corporate'),
            'tercapai' => $this->input->post('tercapai'),
            'keterangan' => $this->input->post('keterangan'),
            'by' => $this->session->userdata('nama_user'),
            'at' => date('d F Y'),
            'total' => $tercapai[0]{'corporate_tercapai'} + $this->input->post('tercapai')
        ];
        $this->corporate->progress($data);
        $this->corporate->tercapai($data);
        redirect('kpi/corporate/'.$this->session->userdata('nama_user').'/'. encrypt_url($this->session->userdata('id_user')).'');
    }

    function delete(){
        $data = [
            'key' => $this->input->post('corporate')
        ];
        $this->corporate->delete($data);
        redirect('kpi/corporate/'.$this->input->post('nama').'/'. encrypt_url($this->input->post('user')).'');
    }

    function delete_sanksi(){
        $data = [
            'id_sanksi' => $this->input->post('sanksi')
        ];
        $this->corporate->delete_sanksi($data);
        redirect('kpi/corporate/'.$this->input->post('nama').'/'. encrypt_url($this->input->post('user')).'');
    }


    public function graph($id){
        $list=array();
        $month = date('m');
        $year = date('Y');
        for($d=1; $d<=31; $d++){
            $time=mktime(12, 0, 0, $month, $d, $year);          
            if (date('m', $time)==$month){       
                $list[]=date('d', $time);
                $bulan=date('F', $time);
            }
        }
        $progress = $this->corporate->graph(array('key' => $id, 'date' => date('F Y')));
        $arr=[];
        foreach($progress as $n ){
            $date = date('d', strtotime($n{'progress_create_at'}));
            if(!isset($arr[$date])){
                $arr[$date] = $n;
                $arr[$date]{'bulan'} = date('F', strtotime($n{'progress_create_at'}));
            }else{
                (int) $arr[$date]{'progress_tercapai'} += (int) $n{'progress_tercapai'};
            }
        }
        $kumulatif = NULL;
        $graph =[];
        foreach($list as $n){
            if(!isset($arr[$n])){
                $graph[ltrim($n, '0')]= (object)[
                    'tanggal' => $n,
                    'bulan' => $bulan,
                    'progress_tercapai' => 0,
                    'kumulatif' => $kumulatif
                ];
            }else{
                $kumulatif += $arr[$n]{'progress_tercapai'};
                $graph[ltrim($n, '0')]= (object)[
                    'tanggal' => $n,
                    'bulan' => $bulan,
                    'progress_tercapai' => $arr[$n]{'progress_tercapai'},
                    'kumulatif' => $kumulatif
                ];
            }
            
        }
        return $graph;
    }

    function tips($data){
        $kategori = [];
        $output = explode(' ', date('m Y'));
        $tanggal = cal_days_in_month(CAL_GREGORIAN, $output[0], $output[1]);
        foreach($data as $index => $n){
            foreach($n as $index_nilai => $nilai){
                if (strpos($index_nilai, 'nilai_') !== FALSE) {
                    if ($nilai != "") {
                        $kategori[$index][ str_replace('nilai_', '', $index_nilai)] = $nilai;
                    }
                }
            }
            unset($kategori[$index]["jenis"]);
            krsort($kategori[$index]);
            foreach ($kategori[$index] as $standart => $nilai) {
                if($n{'nilai_10'} >= $nilai){
                    $tips = 'Target adalah '.$data[0]{'corporate_target'}.'. Maka Per Hari Pencapaian Tidak Bertambah Sebanyak '.ceil($data[0]{'corporate_target'} / $tanggal).'';
                    break;
                }else{
                    $tips = 'Untuk Mencapai Target '.$data[0]{'corporate_target'}.'. Minimal Pencapainya per hari adalah '.ceil($data[0]{'corporate_target'} / $tanggal);
                    break;
                }
            }
        }
       return $tips;
    }

    function bobot($data,$bobot){
        $jlh = 0;
        foreach($data as $n){
            $jlh += $n{'corporate_bobot'};
        }
        return $jlh + $bobot;
    }
}
?>