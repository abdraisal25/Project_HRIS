<?php
use GuzzleHttp\Client;

class M_Tujuan extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/jobdesc/tujuan/TujuanServer/'
        ]);
    }

    function view_detail($data){
        $response = $this->perusahaan->request('GET','tujuan_detail',[
            'query' => [
                'id_tujuan' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->perusahaan->request('POST','tujuan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->perusahaan->request('PUT','tujuan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->perusahaan->request('DELETE','tujuan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

?>