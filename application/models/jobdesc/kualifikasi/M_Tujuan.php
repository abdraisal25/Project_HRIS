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

    // function view_jobdesc_detail($data){
    //     $response = $this->perusahaan->request('GET','jobdesc_detail',[
    //         'query' => [
    //             'id_jobdesc' => $data['id_jobdesc']
    //         ]
    //     ]);
    //     $result = json_decode($response->getBody()->getContents(), true);
    //     return $result['data'];
    // }
    
    // function view_jobdesc_full($data){
    //     $response = $this->perusahaan->request('GET','jobdesc_full',[
    //         'query' => [
    //             'id_perusahaan' => $data['id_perusahaan']
    //         ]
    //     ]);
    //     $result = json_decode($response->getBody()->getContents(), true);
    //     return $result['data'];
    // }
    
    // function view_level_detail($data){
    //     $response = $this->perusahaan->request('GET','level_detail',[
    //         'query' => [
    //             'id_standart_level' => $data['id_standart_level']
    //         ]
    //     ]);
    //     $result = json_decode($response->getBody()->getContents(), true);
    //     return $result['data'];
    // }

    function insert($data){
        $response = $this->perusahaan->request('POST','tujuan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update_jobdesc($data){
        $response = $this->perusahaan->request('PUT','tujuan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete_jobdesc($data){
        $response = $this->perusahaan->request('DELETE','tujuan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

?>