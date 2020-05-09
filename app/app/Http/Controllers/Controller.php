<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\QuantityDeliveryCost;
use App\Models\ValueDeliveryCost;
use App\Models\WeightDeliveryCost;
use App\Repository\Repository;
use App\Services\BasketCostService;
use App\Services\DeliveryCostService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Repository $repository
     * @return Factory|\Illuminate\View\View
     */
    public function index(Repository $repository) {

        // test with database order id = 1
        $order = Order::with(['client', 'lines'])->find(1);

        $cost = $this->getDeliveryCostHelper($order, $repository);

        $results = [
            $this->testManually($repository),
            ['description' => 'Database test ', 'order' => $order, 'cost' => $cost],
        ];

        return view('cost', [
            'valueDeliveryCosts' => ValueDeliveryCost::with('client')->get(),
            'weightDeliveryCosts' => WeightDeliveryCost::with('client')->get(),
            'quantityDeliveryCosts' => QuantityDeliveryCost::with('client')->get(),
            'results' => $results
        ]);
    }

    /**
     * @param Order $order
     * @param Repository $repository
     * @return float|int
     */
    private function getDeliveryCostHelper(Order $order, Repository $repository) {
        $basketService = new BasketCostService($order->client, $order->payment, $repository);
        $deliveryCostService = new DeliveryCostService($order, $basketService);
        return $deliveryCostService->getCost();
    }

    /**
     * @param Repository $repository
     * @return array
     */
    private function testManually(Repository $repository) {

        $payment = 'cash';

        $client = Client::whereName('Client_1')->first();

        $order = new Order();
        $order->payment = $payment;
        $order->client()->associate($client);

        $product1 = Product::whereName('Product_1')->first();
        $orderLine1 = new OrderLine();
        $orderLine1->product()->associate($product1);
        $orderLine1->order()->associate($order);
        $orderLine1->quantity = 1;
        $orderLine1->price = 1;

        $product2 = Product::whereName('Product_2')->first();
        $orderLine2 = new OrderLine();
        $orderLine2->product()->associate($product2);
        $orderLine2->order()->associate($order);
        $orderLine2->quantity = 2;
        $orderLine2->price = 1;

        $product3 = Product::whereName('Product_3')->first();
        $orderLine3 = new OrderLine();
        $orderLine3->product()->associate($product3);
        $orderLine3->order()->associate($order);
        $orderLine3->quantity = 1;
        $orderLine3->price = 1;

        $product4 = Product::whereName('Product_4')->first();
        $orderLine4 = new OrderLine();
        $orderLine4->product()->associate($product4);
        $orderLine4->order()->associate($order);
        $orderLine4->quantity = 1;
        $orderLine4->price = 1;

        $order->lines->add($orderLine1);
        $order->lines->add($orderLine2);
        $order->lines->add($orderLine3);
        $order->lines->add($orderLine4);

        $cost = $this->getDeliveryCostHelper($order, $repository);

        return ['description' => 'Manual test ', 'order' => $order, 'cost' => $cost];
    }
}
