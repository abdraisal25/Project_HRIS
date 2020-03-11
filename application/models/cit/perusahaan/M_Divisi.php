<?php
use GuzzleHttp\Client;

class M_Divisi extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/perusahaan/DivisiServer/'
        ]);
    }

    function view($data){
        $response = $this->perusahaan->request('GET','divisi',[
            'query' => [
                'id_jenus' => $data['id_jenus']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){     
        $response = $this->perusahaan->request('GET','divisi_detail',[
            'query' => [
                'id_divisi' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->perusahaan->request('POST','divisi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->perusahaan->request('PUT','divisi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->perusahaan->request('DELETE','divisi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function select($data){
        $response = $this->perusahaan->request('GET','select',[
            'query' => [
                'id_jenus' => $data['id_jenus']
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