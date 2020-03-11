<?php
use GuzzleHttp\Client;

class M_Perusahaan extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/PerusahaanServer/'
        ]);
    }

    function view_perusahaan($id){
        $response = $this->perusahaan->request('GET','perusahaan',[
            'query' => [
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    ///////////PERUSAHAAN/////////////////////////
    function register_perusahaan($data){
        $response = $this->perusahaan->request('POST','register',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function login_perusahaan($data){
        $response = $this->perusahaan->request('GET','cek_perusahaan',[
            'query' => [
                'username' => $data['username'],
                'password' => $data['password'],
                'status' => $data['status']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    ///////////////////////////////////////////

}

?>