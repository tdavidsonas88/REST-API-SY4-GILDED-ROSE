<?php

namespace App\Service;

use GuzzleHttp\Client;

class ItemService {

    public function callItemGetAction($name) {

        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8000/item?name='.$name);

        // echo $response->getStatusCode(); # 200
        // echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
        $rez = $response->getBody(); 
        return $rez;
        
    }
}