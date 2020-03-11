<?php
use GuzzleHttp\Client;

class M_Departement extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/perusahaan/DepartementServer/'
        ]);
    }

    function view($data){
        $response = $this->perusahaan->request('GET','departement',[
            'query' => [
                'id_divisi' => $data['id_divisi']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){     
        $response = $this->perusahaan->request('GET','departement_detail',[
            'query' => [
                'id_departement' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->perusahaan->request('POST','departement',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->perusahaan->request('PUT','departement',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function delete($data){
        $response = $this->perusahaan->request('DELETE','departement',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function select(){
        $response = $this->perusahaan->request('GET','select',[
            'query' => [
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

}

?>