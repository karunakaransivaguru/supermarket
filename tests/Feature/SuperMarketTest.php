<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\SuperMarketServices;
class SuperMarketTest extends TestCase
{
    /**
     * A Calculate Iteam Code A.
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
        $this->assertEquals(230, $result);
    }
    /**
     *  A Calculate Iteam Code B.
     *
     * @return void
     * @test
     */
    public function IteamCode_B()
    {
        $obj = new SuperMarketServices;
        $result = $obj->calculateItemTotal("B" , 5 , 1 , 0 );
        $this->assertEquals(120, $result);
    }
    /**
     *  A Calculate Iteam Code C.
     *
     * @return void
     * @test
     */
    public function IteamCode_C()
    {
        $obj = new SuperMarketServices;
        $result = $obj->calculateItemTotal("C" , 5 , 1 , 0 );
        $this->assertEquals(90, $result);
    }
    /**
     * A Calculate Iteam Code D.
     *
     * @return void
     * @test
     */
    public function IteamCode_D()
    {
        $obj = new SuperMarketServices;
        $result = $obj->calculateItemTotal("D" , 5 , 1 , 2 );
        $this->assertEquals(55, $result);
    }
}
