<?php

namespace App\Service;

use App\Entity\Item;
use GuzzleHttp\Client;

class ItemService {

    public function callItemGetAction($name) {

        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8000/item?name='.$name);

        $rez = json_decode($response->getBody(), true); 
        return $rez;
        
    }

    public function callItemPostAction(Item $item) {

        $client = new Client();

        $params = array(
            'form_params' => array(
                'name' => $item->getName(),
                'sell_in' => $item->getSell_in(),
                'quality' => $item->getQuality()
            )
        );

        $response = $client->request('POST', 'http://127.0.0.1:8000/item', $params);
        return $response;

    }

    public function callItemsGetAction() {

        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8000/items');

        $rez = json_decode($response->getBody(), true); 
        return $rez;
        
    }
}