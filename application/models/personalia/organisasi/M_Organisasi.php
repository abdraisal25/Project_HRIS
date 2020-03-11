<?php
use GuzzleHttp\Client;

class M_Organisasi extends CI_Model{

    private $personalia;

    function __construct(){
        parent::__construct();
        $this->personalia = new Client([
            'base_uri' => 'http://localhost/server_cit/personalia/organisasi/OrganisasiServer/'
        ]);
    }

    function biodata_detail($data){
        $response = $this->personalia->request('GET','detail',[
            'query' => [
                'id_organisasi' => $data['id_biodata']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->personalia->request('POST','organisasi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->personalia->request('DELETE','organisasi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

?>