<?php
use GuzzleHttp\Client;

class M_Standart_Level extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/LevelServer/'
        ]);
    }

    function view_level($data){
        $response = $this->perusahaan->request('GET','level',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function view_level_detail($data){
        $response = $this->perusahaan->request('GET','level_detail',[
            'query' => [
                'id_standart_level' => $data['id_standart_level']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_level($data){
        $response = $this->perusahaan->request('POST','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
  
    function update_level($data){
        $response = $this->perusahaan->request('PUT','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function delete_level($data){
        $response = $this->perusahaan->request('DELETE','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

}

?>