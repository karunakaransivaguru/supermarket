<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SuperMarketTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    /*
      param 1 : ItemCode
      param2  : quantity
      param3  : special offer
      param4  : itemCode E (optional)
    */
    public function IteamCode_A()
    {
        $obj = new SuperMarketServices;
        $result = $obj->calculateItemTotal("A" , 5 , 1 , 0 );
        $obj->assertEquals(230, $result);
    }
    public function IteamCode_B()
    {
        $obj = new SuperMarketServices;
        $result = $obj->calculateItemTotal("B" , 5 , 1 , 0 );
        $obj->assertEquals(120, $result);
    }
    public function IteamCode_C()
    {
        $obj = new SuperMarketServices;
        $result = $obj->calculateItemTotal("C" , 5 , 1 , 0 );
        $obj->assertEquals(90, $result);
    }
    public function IteamCode_D()
    {
        $obj = new SuperMarketServices;
        $result = $obj->calculateItemTotal("D" , 5 , 1 , 2 );
        $obj->assertEquals(55, $result);
    }
}
