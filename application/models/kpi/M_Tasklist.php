<?php
use GuzzleHttp\Client;

class M_Tasklist extends CI_Model{

    private $tasklist;

    function __construct(){
        parent::__construct();
        $this->tasklist = new Client([
            'base_uri' => 'http://localhost/server_cit/kpi/TasklistServer/'
        ]);
    }

    function tasklist($data){
        $response = $this->tasklist->request('GET','tasklist',[
            'query' => [
                'id_user' => $data['id_user'],
                'output' => $data['output']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
   
    function tasklist_pending($data){
        $response = $this->tasklist->request('GET','tasklist_pending',[
            'query' => [
                'id_user' => $data['id_user'],
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function view_progress($data){
        $response = $this->tasklist->request('GET','progress',[
            'query' => [
                'id_tasklist' => $data['tasklist']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function tasklist_detail($data){
        $response = $this->tasklist->request('GET','tasklist_detail',[
            'query' => [
                'id_tasklist' => $data['id_tasklist']
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert($data){
        $response = $this->tasklist->request('POST','tasklist',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
   
    function progress($data){
        $response = $this->tasklist->request('POST','progress',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    
    function done($data){
        $response = $this->tasklist->request('PUT','tasklist',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function delete($data){
        $response = $this->tasklist->request('DELETE','tasklist',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

?>