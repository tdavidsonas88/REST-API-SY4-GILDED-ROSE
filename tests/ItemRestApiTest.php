<?php

namespace App\tests;

use App\Service\ItemService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class ItemRestApiTest extends TestCase {

    /** var ItemService $itemService */
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    
    public function testGetItem(){
        $name = 'test';

        $rez = $this->itemService->callItemGetAction($name);
        $this->assertEquals($name, $rez['name']);
    }
}