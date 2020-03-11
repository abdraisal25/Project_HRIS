<?php
use GuzzleHttp\Client;

class M_Jobdesc extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/jobdesc/JobdescServer/'
        ]);
    }

    function view_jobdesc($data){
        $response = $this->perusahaan->request('GET','jobdesc',[
            'query' => [
                'key_jabatan' => $data['key']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function view_jabatan($data){
        $response = $this->perusahaan->request('GET','jabatan',[
            'query' => [
                'key_jabatan' => $data['key']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_jobdesc($data){
        $response = $this->perusahaan->request('POST','jobdesc',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

?>