<?php
use GuzzleHttp\Client;

class M_Jabatan extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/JabatanServer/'
        ]);
    }

    function view_jabatan($data){
        $response = $this->perusahaan->request('GET','jabatan',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_jabatan_detail($data){
        $response = $this->perusahaan->request('GET','jabatan_detail',[
            'query' => [
                'id_jabatan' => $data['id_jabatan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function get_jabatan($data){
        $response = $this->perusahaan->request('GET','jabatan_join',[
            'query' => [
                'key_jabatan' => $data['id_jabatan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function view_jabatan_full($data){
        $response = $this->perusahaan->request('GET','jabatan_full',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function view_level_detail($data){
        $response = $this->perusahaan->request('GET','level_detail',[
            'query' => [
                'id_standart_level' => $data['id_standart_level']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_jabatan($data){
        $response = $this->perusahaan->request('POST','jabatan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function new_jabatan($data){
        $response = $this->perusahaan->request('POST','new_jabatan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update_jabatan($data){
        $response = $this->perusahaan->request('PUT','jabatan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete_jabatan($data){
        $response = $this->perusahaan->request('DELETE','jabatan',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function select($data){
        $response = $this->perusahaan->request('GET','select',[
            'query' => [
                'id_jenus' => $data['id_jenus']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function select_jabatan($data){
        $response = $this->perusahaan->request('GET','jabatan_user',[
            'query' => [
                'id_departement' => $data['id_departement'],
                'id_perusahaan' => $data['id_perusahaan'],
                'id_level' => $data['id_level']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function notif($status,$task){
        if($status){
            return $task;
        }else{
            return 'gagal';
        }
    }

}

?>