<?php
use GuzzleHttp\Client;

class M_Wewenang extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/perusahaan/jobdesc/WewenangServer/'
        ]);
    }

    function view($data){
        $response = $this->perusahaan->request('GET','wewenang',[
            'query' => [
                'id_jabatan' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){     
        $response = $this->perusahaan->request('GET','wewenang_detail',[
            'query' => [
                'id_wewenang' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->perusahaan->request('POST','wewenang',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function delete($data){
        $response = $this->perusahaan->request('DELETE','wewenang',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

}

?>