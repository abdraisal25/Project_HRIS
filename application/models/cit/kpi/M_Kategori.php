<?php
use GuzzleHttp\Client;

class M_Kategori extends CI_Model{

    private $kpi;

    function __construct(){
        parent::__construct();
        $this->kpi = new Client([
            'base_uri' => 'http://localhost/server_cit/cit/kpi/KategoriServer/'
        ]);
    }

    function view(){
        $response = $this->kpi->request('GET','kategori',[
            'query' => []
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_detail($data){
        $response = $this->kpi->request('GET','kategori_detail',[
            'query' => [
                'id_kategori' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    

    function insert($data){
        $response = $this->kpi->request('POST','kategori',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->kpi->request('PUT','kategori',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->kpi->request('DELETE','kategori',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

?>