<?php
use GuzzleHttp\Client;

class M_Jenis extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/perusahaan/JenisServer/'
        ]);
    }

    function view(){
        $response = $this->perusahaan->request('GET','jenis',[
            'query' => []
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){
        $response = $this->perusahaan->request('GET','jenis_detail',[
            'query' => [
                'id_jenus' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->perusahaan->request('POST','jenis',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->perusahaan->request('PUT','jenis',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->perusahaan->request('DELETE','jenis',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function select($data){
        $response = $this->perusahaan->request('GET','select',[
            'query' => [
                'id_jenus' => $data
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
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