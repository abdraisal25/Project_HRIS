<?php
use GuzzleHttp\Client;

class M_Corporate extends CI_Model{

    private $corporate,$kategori,$perspektife,$member,$sanksi;

    function __construct(){
        parent::__construct();
        $this->corporate = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/CorporateServer/'
        ]);
        $this->kategori = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/kpi/KategoriServer/'
        ]);
        $this->perspektife = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/kpi/CorporateServer/'
        ]);
        $this->member = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/JabatanServer/'
        ]);
        $this->sanksi = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/SanksiServer/'
        ]);
    }

    function kategori(){
        $response = $this->kategori->request('GET','kategori',[
            'query' => []
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function perspektife($data){
        $response = $this->perspektife->request('GET','select',[
            'query' => [
                'id_jenus' => $data['id_jenus']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function sanksi($data){
        $response = $this->sanksi->request('GET','sanksi',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function member_user($data){
        $response = $this->member->request('GET','select_user',[
            'query' => [
                'id_jabatan' => $data['id_jabatan'],
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
  
    function member_user_admin($data){
        $response = $this->member->request('GET','select_user_admin',[
            'query' => [
                'id_departement' => $data['id_departement'],
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function get_level($data){
        $response = $this->member->request('GET','level',[
            'query' => [
                'id_jabatan' => $data['id_jabatan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_corporate($data){
        $response = $this->corporate->request('GET','corporate',[
            'query' => [
                'id_user' => $data['id_user'],
                'output' => $data['output']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_sanksi($data){
        $response = $this->sanksi->request('GET','sanksi_member',[
            'query' => [
                'id_user' => $data['id_user'],
                'output' => $data['output']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_progress($data){
        $response = $this->corporate->request('GET','progress',[
            'query' => [
                'key_corporate' => $data['key']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function graph($data){
        $response = $this->corporate->request('GET','graph',[
            'query' => [
                'key_corporate' => $data['key'],
                'date' => $data['date'],
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function corporate_detail($data){
        $response = $this->corporate->request('GET','corporate_detail',[
            'query' => [
                'key_corporate' => $data['key']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->corporate->request('POST','corporate',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function add_corporate($data){
        var_dump($data);
        $response = $this->corporate->request('POST','add_corporate',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['corporate'];
    }

    function sanksi_member($data){
        $response = $this->sanksi->request('POST','sanksi_member',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function view_sanksi_member($data){
        $response = $this->sanksi->request('GET','sanksi_member_detail',[
            'query' => [
                'id_sanksi' => $data['id_sanksi']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function progress($data){
        $response = $this->corporate->request('POST','progress',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function tercapai($data){
        $response = $this->corporate->request('PUT','tercapai',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function delete($data){
        $response = $this->corporate->request('DELETE','corporate',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function delete_sanksi($data){
        $response = $this->sanksi->request('DELETE','sanksi_member',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function notif($status,$task){
        if($status){
            return $task;
        }else{
            return 'gagal';
        }
    }
}

?>