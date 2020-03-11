<?php
use GuzzleHttp\Client;

class M_History extends CI_Model{

    private $member,$history,$corporate;

    function __construct(){
        parent::__construct();
        $this->history = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/HistoryServer/'
        ]);
        $this->member = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/JabatanServer/'
        ]);
        $this->corporate = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/CorporateServer/'
        ]);
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

    function view_corporate($data){
        $response = $this->corporate->request('GET','corporate',[
            'query' => [
                'id_user' => $data['id_user']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function history_user($data){
        $response = $this->history->request('GET','history_user',[
            'query' => [
                'id_user' => $data['id_user']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_history($data){
        $response = $this->history->request('GET','history',[
            'query' => [
                'id_user' => $data['id_user'],
                'tahun' => $data['tahun']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){ 
        $response = $this->history->request('POST','history',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function update($data){
        $response = $this->history->request('PUT','history',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

?>