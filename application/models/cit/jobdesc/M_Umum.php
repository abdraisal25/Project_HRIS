<?php
use GuzzleHttp\Client;

class M_Umum extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/perusahaan/jobdesc/UmumServer/'
        ]);
    }

    function view($data){
        $response = $this->perusahaan->request('GET','umum',[
            'query' => [
                'id_jabatan' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){     
        $response = $this->perusahaan->request('GET','umum_detail',[
            'query' => [
                'id_umum' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->perusahaan->request('POST','umum',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function delete($data){
        $response = $this->perusahaan->request('DELETE','umum',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

}

?>