<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Order;
use App\Models\OrderLine;

class DeliveryCostService
{
    /**
     * @var Client
     */
    private $order;

    /**
     * @var float
     */
    private $valueBasket = 0;
    /**
     * @var float
     */
    private $weightBasket = 0;
    /**
     * @var float
     */
    private $quantityBasket = 0;
    /**
     * @var float
     */
    private $individualCostBasket = 0;
    /**
     * @var BasketCostService
     */
    private $basketCostService;

    /**
     * DeliveryCostService constructor.
     * @param Order $order
     * @param BasketCostService $basketCostService
     */
    public function __construct(Order $order, BasketCostService $basketCostService)
    {
        $this->order = $order;
        $this->basketCostService = $basketCostService;
    }


    /**
     * @return float|int
     */
    public function getCost()
    {
        $this->prepareCostBaskets();
        return $this->sumBasketCosts();
    }


    /**
     *
     */
    protected function prepareCostBaskets():void
    {

        foreach ($this->order->lines as $orderLine) {
            $this->addValueBasket($orderLine);
            $this->addWeightBasket($orderLine);
            $this->addQuantityBasket($orderLine);
            $this->addIndividualCostBasket($orderLine);
        }

    }

    /**
     * @return float|int
     */
    protected function sumBasketCosts()
    {
        $total = 0;
        $total += $this->basketCostService->getValueBasketCost($this->valueBasket);
        $total += $this->basketCostService->getWeightBasketCost($this->weightBasket);
        $total += $this->basketCostService->getQuantityBasketCost($this->quantityBasket);
        $total += $this->individualCostBasket;
        return $total;

    }

    /**
     * @param OrderLine $orderLine
     */
    protected function addValueBasket(OrderLine $orderLine): void
    {
        if ($orderLine->product->calculate_value_cost) {
            $this->valueBasket += $orderLine->quantity * $orderLine->price;
        }
    }

    /**
     * @param OrderLine $orderLine
     */
    protected function addWeightBasket(OrderLine $orderLine): void
    {
        if ($orderLine->product->calculate_weight_cost) {
            $this->weightBasket += $orderLine->product->weight * $orderLine->quantity;
        }
    }

    /**
     * @param OrderLine $orderLine
     */
    protected function addQuantityBasket(OrderLine $orderLine): void
    {
        if ($orderLine->product->calculate_quantity_cost) {
            $this->quantityBasket += $orderLine->quantity;
        }
    }

    /**
     * @param OrderLine $orderLine
     */
    protected function addIndividualCostBasket(OrderLine $orderLine): void
    {
        if ($orderLine->product->calculate_individual_cost) {
            if ($orderLine->product->cost_per_piece) {
                $this->individualCostBasket += $orderLine->product->cost_per_piece * $orderLine->quantity;
            }

            if ($orderLine->product->flat_cost) {
                $this->individualCostBasket += $orderLine->product->flat_cost;
            }
        }
    }

}