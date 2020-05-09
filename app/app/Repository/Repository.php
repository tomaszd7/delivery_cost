<?php


    namespace App\Repository;


    use App\Models\QuantityDeliveryCost;
    use App\Models\ValueDeliveryCost;
    use App\Models\WeightDeliveryCost;

    class Repository
    {

        /**
         * @param float $valueBasket
         * @param string|null $payment
         * @param int|null $clientId
         * @param string|null $clientGroup
         * @return ValueDeliveryCost|null
         */
        public function getValueBasketCost(float $valueBasket, ?string $payment = null, ?int $clientId = null, ?string $clientGroup = null):?ValueDeliveryCost
        {
            return ValueDeliveryCost::where([
                ['client_id' , '=', $clientId ],
                ['client_group' , '=', $clientGroup ],
                ['payment', '=', $payment],
                ['value_from' , '<=', $valueBasket ],
                ['value_to' , '>=', $valueBasket ]
            ])->first();
        }

        /**
         * @param float $weightBasket
         * @param string $payment
         * @param int|null $clientId
         * @param string|null $clientGroup
         * @return WeightDeliveryCost|null
         */
        public function getWeightBasketCost(float $weightBasket, ?string $payment = null, ?int $clientId = null, ?string $clientGroup = null): ?WeightDeliveryCost
        {
            return WeightDeliveryCost::where([
                ['client_id' , '=', $clientId ],
                ['client_group' , '=', $clientGroup ],
                ['payment', '=', $payment],
                ['weight_from' , '<=', $weightBasket ],
                ['weight_to' , '>=', $weightBasket ]
            ])->first();
        }


        /**
         * @param float $quantityBasket
         * @param string $payment
         * @param int|null $clientId
         * @param string|null $clientGroup
         * @return QuantityDeliveryCost|null
         */
        public function getQuantityBasketCost(float $quantityBasket, ?string $payment = null, ?int $clientId = null, ?string $clientGroup = null):?QuantityDeliveryCost
        {
            return QuantityDeliveryCost::where([
                ['client_id' , '=', $clientId ],
                ['client_group' , '=', $clientGroup ],
                ['payment', '=', $payment],
                ['quantity_from' , '<=', $quantityBasket ],
                ['quantity_to' , '>=', $quantityBasket ]
            ])->first();
        }



    }