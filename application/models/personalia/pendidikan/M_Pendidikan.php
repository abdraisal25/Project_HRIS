<?php
use GuzzleHttp\Client;

class M_Pendidikan extends CI_Model{

    private $personalia;

    function __construct(){
        parent::__construct();
        $this->personalia = new Client([
            'base_uri' => 'http://localhost/server_cit/personalia/pendidikan/PendidikanServer/'
        ]);
    }

    function biodata_detail($data){
        $response = $this->personalia->request('GET','detail',[
            'query' => [
                'id_pendidikan' => $data['id_biodata']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->personalia->request('POST','pendidikan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->personalia->request('DELETE','pendidikan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

?>