<?php
use GuzzleHttp\Client;

class M_Sanksi extends CI_Model{

    private $sanksi;

    function __construct(){
        parent::__construct();
        $this->corporate = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/SanksiServer/'
        ]);
    }

    function sanksi($data){
        $response = $this->corporate->request('GET','sanksi',[
            'query' => [
                'id_perusahaan' => $data['id_perusahaan']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function sanksi_detail($data){
        $response = $this->corporate->request('GET','sanksi_detail',[
            'query' => [
                'id_sanksi' => $data['id_sanksi']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->corporate->request('POST','sanksi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function progress($data){
        $response = $this->corporate->request('POST','sanksi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function delete($data){
        $response = $this->corporate->request('DELETE','sanksi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

?>