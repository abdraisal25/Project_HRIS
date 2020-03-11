<?php
use GuzzleHttp\Client;

class M_Position extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/perusahaan/PositionServer/'
        ]);
    }

    function view_divisi($data){
        $response = $this->perusahaan->request('GET','divisi',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function view_divisi_detail($data){
        $response = $this->perusahaan->request('GET','divisi_detail',[
            'query' => [
                'id_divisi' => $data['id_divisi']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_divisi($data){
        $response = $this->perusahaan->request('POST','divisi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update_divisi($data){
        $response = $this->perusahaan->request('PUT','divisi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete_divisi($data){
        $response = $this->perusahaan->request('DELETE','divisi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function view_departement($data){
        $response = $this->perusahaan->request('GET','departement',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    function view_departement_member($data){
        $response = $this->perusahaan->request('GET','departement_member',[
            'query' => [
                'id_divisi' => $data['id_divisi']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_departement_detail($data){
        $response = $this->perusahaan->request('GET','departement_detail',[
            'query' => [
                'id_departement' => $data['id_departement']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_departement($data){
        $response = $this->perusahaan->request('POST','departement',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function update_departement($data){
        $response = $this->perusahaan->request('PUT','departement',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function delete_departement($data){
        $response = $this->perusahaan->request('DELETE','departement',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

?>