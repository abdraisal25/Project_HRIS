<?php
use GuzzleHttp\Client;

class M_Hasil extends CI_Model{

    private $perusahaan;

    function __construct(){
        parent::__construct();
        $this->perusahaan = new Client([
            'base_uri' => 'http://localhost/server_cit/jobdesc/hasil/HasilServer/'
        ]);
    }

    function view_detail($data){
        $response = $this->perusahaan->request('GET','hasil_detail',[
            'query' => [
                'id_hasil' => $data['id']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->perusahaan->request('POST','hasil',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
  
    function update($data){
        $response = $this->perusahaan->request('PUT','hasil',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function delete($data){
        $response = $this->perusahaan->request('DELETE','hasil',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

?>