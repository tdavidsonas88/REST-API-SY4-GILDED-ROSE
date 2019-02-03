<?php

namespace App\tests;

use App\Entity\Item;
use App\Service\ItemService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class ItemRestApiTest extends TestCase {

    /**
     * item was created with post request:
     * 
     * {
        "name": "test",
        "sell_in": 2,
        "quality": 25
        }
    */
    public function testGetItem(){

        $name = 'test';

        $itemService = new ItemService();

        $rez = $itemService->callItemGetAction($name);

        $this->assertEquals($name, $rez['name']);
        $this->assertEquals(2, $rez['sell_in']);
        $this->assertEquals(25, $rez['quality']);
    }

    public function testPostItem(){

        $name = 'test2';

        $item = new Item();
        $item->setName('test2');
        $item->setSell_in(5);
        $item->setQuality(30);

        $itemService = new ItemService();
        $rezPost = $itemService->callItemPostAction($item);

        $rez = $itemService->callItemGetAction($name);

        $this->assertEquals('test2', $rez['name']);
        $this->assertEquals(5, $rez['sell_in']);
        $this->assertEquals(30, $rez['quality']);

    }

    public function testGetItems(){
        $itemService = new ItemService();
        $rez = $itemService->callItemsGetAction();

        $this->assertEquals(2, count($rez));
        $this->assertEquals('test2', $rez[1]['name']);
    }



}