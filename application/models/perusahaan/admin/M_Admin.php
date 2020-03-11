<?php
use GuzzleHttp\Client;

class M_Admin extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/admin/AdminServer/'
        ]);
    }

    function admin_departement($data){
        $response = $this->perusahaan->request('GET','admin',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan'],
                'id_level' => $data['level']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function member($data){
        $response = $this->perusahaan->request('GET','member',[
            'query' => [
                'key_jabatan' => $data['key']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function create($data){
        $response = $this->perusahaan->request('POST','create',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_level_detail($data){
        $response = $this->perusahaan->request('GET','level_detail',[
            'query' => [
                'id_id_jabatan' => $data['id_id_jabatan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_data($data){
        $response = $this->perusahaan->request('POST','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
  
    function update_level($data){
        $response = $this->perusahaan->request('PUT','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function delete_level($data){
        $response = $this->perusahaan->request('DELETE','level',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

}

?>