<?php
use GuzzleHttp\Client;

class M_Khusus extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/jobdesc/khusus/KhususServer/'
        ]);
    }

    function view_data(){
        $response = $this->perusahaan->request('GET','khusus',[
            'query' => []
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function view_detail($data){
        $response = $this->perusahaan->request('GET','khusus_detail',[
            'query' => [
                'id_khusus' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->perusahaan->request('POST','khusus',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function delete($data){
        $response = $this->perusahaan->request('DELETE','khusus',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

?>