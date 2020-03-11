<?php
use GuzzleHttp\Client;

class M_personalia extends CI_Model{

    private $personalia;

    function __construct(){
        parent::__construct();
        $this->personalia = new Client([
            'base_uri' => 'http://localhost/server_cit/personalia/PersonaliaServer/'
        ]);
    }
    
    ///////////personalia/////////////////////////
    function register_user($data){
        $response = $this->personalia->request('POST','register',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    
    function login_user($data){
        $response = $this->personalia->request('GET','cek_user',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan'],
                'username' => $data['username'],
                'password' => $data['password'],
                'status' => $data['status']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    ///////////////////////////////////////////

    function view($data){
        $response = $this->personalia->request('GET','view',[
            'query' => [
                'id_user' => $data['id_user']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function cek_akun($data){
        $response = $this->personalia->request('GET','cek_akun',[
            'query' => [
                'email' => $data['email'],
                'id_perusahaan' => $data['id_perusahaan']            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function view_member($data){
        $response = $this->personalia->request('GET','view_member',[
            'query' => [
                'id_departement' => $data['id_departement'],
                'id_perusahaan' => $data['id_perusahaan'],
                'id_level' => $data['id_level']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function create($data){
        $response = $this->personalia->request('POST','create',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
}

?>