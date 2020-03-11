<?php
use GuzzleHttp\Client;

class M_Registrasi extends CI_Model{

    private $registrasi;

    function __construct(){
        parent::__construct();
        $this->registrasi = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/registrasi/RegistrasiServer/'
        ]);
    }

    function view(){
        $response = $this->registrasi->request('GET','registrasi',[
            'query' => []
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_perusahaan_detail($data){
        $response = $this->registrasi->request('GET','registrasi_perusahaan_detail',[
            'query' => [
                'id_perusahaan' => $data['id'],
                'status' => $data['status']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_user_detail($data){
        $response = $this->registrasi->request('GET','registrasi_user_detail',[
            'query' => [
                'id_perusahaan' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->registrasi->request('POST','registrasi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function insert_user($data){
        $response = $this->registrasi->request('POST','registrasi_user',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
  
    function update($data){
        $response = $this->registrasi->request('PUT','registrasi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function cek_email($data){
        $response = $this->registrasi->request('GET','cek_email',[
            'query' => [
                'email' => $data
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
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