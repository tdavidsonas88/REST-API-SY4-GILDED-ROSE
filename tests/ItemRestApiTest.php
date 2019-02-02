<?php

namespace App\tests;

use App\Service\ItemService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class ItemRestApiTest extends TestCase {

    public function testGetItem(){

/**
 * item was created with post request:
 * 
 * {
	"name": "test",
	"sell_in": 2,
	"quality": 25
    }
 */

        $name = 'test';

        $itemService = new ItemService();

        $rez = $itemService->callItemGetAction($name);

        var_dump($rez);

        $this->assertEquals($name, $rez['name']);
        $this->assertEquals(2, $rez['sell_in']);
        $this->assertEquals(25, $rez['quality']);
    }
}