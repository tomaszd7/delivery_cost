<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Services\BasketCostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class BasketTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider valueBasketDataProvider
     */
    public function testValueBasketTest($valueBasket, $expectedCost)
    {
        $this->seed();

        $client = Client::find(1);
        $basketService = new BasketCostService($client, null);
        $this->assertEquals($expectedCost, $basketService->getValueBasketCost($valueBasket));
    }


    public function valueBasketDataProvider()
    {
        return [
            [0, 0],
            [5, 10],
            [15, 30],
            [150, 40], // for client group
            [15000, 0], // for client group
        ];
    }

    /**
     * @test
     * @dataProvider weightBasketDataProvider
     */
    public function testWeightBasketTest($weightBasket, $expectedCost)
    {
        $this->seed();

        $client = Client::find(1);
        $basketService = new BasketCostService($client, null);
        $this->assertEquals($expectedCost, $basketService->getWeightBasketCost($weightBasket));
    }


    public function weightBasketDataProvider()
    {
        return [
            [0, 0],
            [5, 5],
            [15, 50],
            [15000, 0],
        ];
    }

    /**
     * @test
     * @dataProvider quantityBasketDataProvider
     */
    public function testQuantityBasketTest($quantityBasket, $expectedCost)
    {
        $this->seed();

        $client = Client::find(1);
        $basketService = new BasketCostService($client, null);
        $this->assertEquals($expectedCost, $basketService->getQuantityBasketCost($quantityBasket));
    }


    public function quantityBasketDataProvider()
    {
        return [
            [0, 0],
            [5, 2],
            [15, 20],
            [1001, 15], // client group A
            [15000, 0],
        ];
    }

}
