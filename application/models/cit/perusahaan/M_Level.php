<?php
use GuzzleHttp\Client;

class M_Level extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/perusahaan/LevelServer/'
        ]);
    }

    function view($data){
        $response = $this->perusahaan->request('GET','level',[
            'query' => [
                'id_jenus' => $data['id_jenus']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){     
        $response = $this->perusahaan->request('GET','level_detail',[
            'query' => [
                'id_level' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function insert($data){
        $response = $this->perusahaan->request('POST','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->perusahaan->request('PUT','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function delete($data){
        $response = $this->perusahaan->request('DELETE','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

}

?>