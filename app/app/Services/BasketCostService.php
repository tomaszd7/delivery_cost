<?php

    namespace App\Services;

    use App\Models\Client;
    use App\Models\QuantityDeliveryCost;
    use App\Models\ValueDeliveryCost;
    use App\Models\WeightDeliveryCost;

    class BasketCostService
    {

        /**
         * @var Client
         */
        private $client;
        /**
         * @var string
         */
        private $payment;

        /**
         * BasketCostService constructor.
         * @param Client $client
         * @param string $payment
         */
        public function __construct(Client $client, ?string $payment)
        {
            $this->client = $client;
            $this->payment = $payment;
        }


        /**
         * @param float $valueBasket
         * @return float
         */
        public function getValueBasketCost(float $valueBasket):float
        {

            // search by client id and payment
            $valueBasketRecord = ValueDeliveryCost::where([
                ['client_id' , '=', $this->client->id ],
                ['client_group' , '=', null ],
                ['payment', '=', $this->payment],
                ['value_from' , '<=', $valueBasket ],
                ['value_to' , '>=', $valueBasket ]
            ])->first();

            // search by group and payment
            if (empty($valueBasketRecord)) {
                $valueBasketRecord = ValueDeliveryCost::where([
                    ['client_id' , '=', null ],
                    ['client_group' , '=', $this->client->group ],
                    ['payment', '=', $this->payment],
                    ['value_from' , '<=', $valueBasket ],
                    ['value_to' , '>=', $valueBasket ]
                ])->first();
            }

            // search general condition
            if (empty($valueBasketRecord)) {
                $valueBasketRecord = ValueDeliveryCost::where([
                    ['client_id' , '=', null ],
                    ['client_group' , '=', null ],
                    ['payment', '=', null],
                    ['value_from' , '<=', $valueBasket ],
                    ['value_to' , '>=', $valueBasket ]
                ])->first();
            }

            return empty($valueBasketRecord)? 0: $valueBasketRecord->cost;
        }

        /**
         * @param float $weightBasket
         * @return float
         */
        public function getWeightBasketCost(float $weightBasket):float
        {
            // search by client id and payment
            $weightBasketRecord = WeightDeliveryCost::where([
                ['client_id' , '=', $this->client->id ],
                ['client_group' , '=', null ],
                ['payment', '=', $this->payment],
                ['weight_from' , '<=', $weightBasket ],
                ['weight_to' , '>=', $weightBasket ]
            ])->first();

            // search by group and payment
            if (empty($weightBasketRecord)) {
                $weightBasketRecord = WeightDeliveryCost::where([
                    ['client_id' , '=', null ],
                    ['client_group' , '=', $this->client->group ],
                    ['payment', '=', $this->payment],
                    ['weight_from' , '<=', $weightBasket ],
                    ['weight_to' , '>=', $weightBasket ]
                ])->first();
            }

            // search general condition
            if (empty($weightBasketRecord)) {
                $weightBasketRecord = WeightDeliveryCost::where([
                    ['client_id' , '=', null ],
                    ['client_group' , '=', null ],
                    ['payment', '=', null],
                    ['weight_from' , '<=', $weightBasket ],
                    ['weight_to' , '>=', $weightBasket ]
                ])->first();
            }

            return empty($weightBasketRecord)? 0: $weightBasketRecord->cost;
        }

        /**
         * @param float $quantityBasket
         * @return float
         */
        public function getQuantityBasketCost(float $quantityBasket):float
        {
            // search by client id and payment
            $quantityBasketRecord = QuantityDeliveryCost::where([
                ['client_id' , '=', $this->client->id ],
                ['client_group' , '=', null ],
                ['payment', '=', $this->payment],
                ['quantity_from' , '<=', $quantityBasket ],
                ['quantity_to' , '>=', $quantityBasket ]
            ])->first();

            // search by group and payment
            if (empty($quantityBasketRecord)) {
                $quantityBasketRecord = QuantityDeliveryCost::where([
                    ['client_id' , '=', null ],
                    ['client_group' , '=', $this->client->group ],
                    ['payment', '=', $this->payment],
                    ['quantity_from' , '<=', $quantityBasket ],
                    ['quantity_to' , '>=', $quantityBasket ]
                ])->first();
            }

            // search general condition
            if (empty($quantityBasketRecord)) {
                $quantityBasketRecord = QuantityDeliveryCost::where([
                    ['client_id' , '=', null ],
                    ['client_group' , '=', null ],
                    ['payment', '=', null],
                    ['quantity_from' , '<=', $quantityBasket ],
                    ['quantity_to' , '>=', $quantityBasket ]
                ])->first();
            }

            return empty($quantityBasketRecord)? 0: $quantityBasketRecord->cost;
        }

    }