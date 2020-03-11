<?php
use GuzzleHttp\Client;

class M_Data extends CI_Model{

    private $perusahaan,$personalia;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/user/DataServer/'
        ]);
        $this->personalia = new Client([
            'base_uri' => 'http://localhost/server_cit/personalia/data/DataServer/'
        ]);
    }

    function view_detail($data){
        $response = $this->perusahaan->request('GET','data_detail',[
            'query' => [
                'id_user' => $data['id_user'],
                'status' => $data['status']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function biodata_detail($data){
        $response = $this->personalia->request('GET','detail',[
            'query' => [
                'id_user' => $data['id_user']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_data($data){
        $response = $this->perusahaan->request('POST','data',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
  
    function insert($data){
        $response = $this->personalia->request('PUT','data',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete_level($data){
        $response = $this->perusahaan->request('DELETE','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function change($data){
        $response = $this->personalia->request('PUT','change',[
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