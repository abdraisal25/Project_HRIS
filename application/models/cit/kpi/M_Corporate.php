<?php
use GuzzleHttp\Client;

class M_Corporate extends CI_Model{

    private $kpi;

    function __construct(){
        parent::__construct();
        $this->kpi = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/kpi/CorporateServer/'
        ]);
    }

    function view($data){
        $response = $this->kpi->request('GET','corporate',[
            'query' => [
                'id_kategori' => $data['id'],
                'id_jenus' => $data['jenus']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){
        $response = $this->kpi->request('GET','corporate_detail',[
            'query' => [
                'id_corporate' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->kpi->request('POST','corporate',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->kpi->request('PUT','corporate',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->kpi->request('DELETE','corporate',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

?>