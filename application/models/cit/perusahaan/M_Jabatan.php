<?php
use GuzzleHttp\Client;

class M_Jabatan extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/perusahaan/JabatanServer/'
        ]);
    }

    function view($data){
        $response = $this->perusahaan->request('GET','jabatan',[
            'query' => [
                'id_departement' => $data['id_departement']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){     
        $response = $this->perusahaan->request('GET','jabatan_detail',[
            'query' => [
                'id_jabatan' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->perusahaan->request('POST','jabatan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->perusahaan->request('PUT','jabatan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function delete($data){
        $response = $this->perusahaan->request('DELETE','jabatan',[
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