<?php

    namespace App\Services;

    use App\Models\Client;
    use App\Repository\Repository;

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
         * @var Repository
         */
        private $repository;

        /**
         * BasketCostService constructor.
         * @param Client $client
         * @param string $payment
         * @param Repository $repository
         */
        public function __construct(Client $client, ?string $payment, Repository $repository)
        {
            $this->client = $client;
            $this->payment = $payment;
            $this->repository = $repository;
        }


        /**
         * @param float $valueBasket
         * @return float
         */
        public function getValueBasketCost(float $valueBasket):float
        {

            // search by client id and payment
            $valueBasketRecord = $this->repository->getValueBasketCost($valueBasket, $this->payment, $this->client->id);

            // search by group and payment
            if (empty($valueBasketRecord)) {
                $valueBasketRecord = $this->repository->getValueBasketCost($valueBasket, $this->payment, null, $this->client->group);
            }
            // search general condition with payment
            if (empty($valueBasketRecord)) {
                $valueBasketRecord = $this->repository->getValueBasketCost($valueBasket, $this->payment);
            }
            // search general condition
            if (empty($valueBasketRecord)) {
                $valueBasketRecord = $this->repository->getValueBasketCost($valueBasket);
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
            $weightBasketRecord = $this->repository->getWeightBasketCost($weightBasket, $this->payment, $this->client->id);

            // search by group and payment
            if (empty($weightBasketRecord)) {
                $weightBasketRecord = $this->repository->getWeightBasketCost($weightBasket, $this->payment, null, $this->client->group);
            }

            // search general condition with payment
            if (empty($weightBasketRecord)) {
                $weightBasketRecord = $this->repository->getWeightBasketCost($weightBasket, $this->payment);
            }

            // search general condition
            if (empty($weightBasketRecord)) {
                $weightBasketRecord = $this->repository->getWeightBasketCost($weightBasket);
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
            $quantityBasketRecord = $this->repository->getQuantityBasketCost($quantityBasket, $this->payment, $this->client->id);

            // search by group and payment
            if (empty($quantityBasketRecord)) {
                $quantityBasketRecord = $this->repository->getQuantityBasketCost($quantityBasket, $this->payment, null, $this->client->group);
            }

            // search general condition with payment
            if (empty($quantityBasketRecord)) {
                $quantityBasketRecord = $this->repository->getQuantityBasketCost($quantityBasket, $this->payment);
            }

            // search general condition
            if (empty($quantityBasketRecord)) {
                $quantityBasketRecord = $this->repository->getQuantityBasketCost($quantityBasket);
            }

            return empty($quantityBasketRecord)? 0: $quantityBasketRecord->cost;
        }

    }