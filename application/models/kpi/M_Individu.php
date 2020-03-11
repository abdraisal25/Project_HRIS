<?php
use GuzzleHttp\Client;

class M_Individu extends CI_Model{

    private $individu,$corporate,$member;

    function __construct(){
        parent::__construct();
        $this->individu = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/IndividuServer/'
        ]);
        $this->member = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/JabatanServer/'
        ]);
        $this->corporate = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/CorporateServer/'
        ]);
    }

    function indicator_persentase(){
        $response = $this->individu->request('GET','indicator_persentase',[
            'query' => []
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function indicator_kpi(){
        $response = $this->individu->request('GET','indicator_kpi',[
            'query' => []
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

    function scroring($data){
        $response = $this->individu->request('GET','scoring',[
            'query' => [
                'id_user' => $data['id_user'],
                'output' => $data['output']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function corporate($data){
        $response = $this->individu->request('GET','corporate',[
            'query' => [
                'id_user' => $data['id_user'],
                'output' => $data['output']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
  
    function tasklist($data){
        $response = $this->individu->request('GET','tasklist',[
            'query' => [
                'id_user' => $data['id_user'],
                'output' => $data['output']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
  
    function sanksi($data){
        $response = $this->individu->request('GET','sanksi',[
            'query' => [
                'id_user' => $data['id_user'],
                'output' => $data['output']
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

    
    function nilai_standart($data){
        $response = $this->corporate->request('GET','corporate_detail',[
            'query' => [
                'key_corporate' => $data['key']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    // function corporate($data){
    //     $response = $this->individu->request('GET','corporate',[
    //         'query' => [
    //             'id_user' => $data['id_user'],
    //             'output' => $data['output']
    //         ]
    //     ]);
    //     $result = json_decode($response->getBody()->getContents(), true);
    //     return $result['data'];
    // }

   
}

?>