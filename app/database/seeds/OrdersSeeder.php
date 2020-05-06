<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // adding order
        DB::table('orders')->insert([
            [
                'client_id' => 1,
                'payment' => 'cash',
            ],
        ]);

        // adding order lines with 3 products
        DB::table('order_lines')->insert([
            [
                'product_id' => 1,
                'order_id' => 1,
                'quantity' => 1,
                'price' => 1,
            ],
            [
                'product_id' => 2,
                'order_id' => 1,
                'quantity' => 1,
                'price' => 1,
            ],
            [
                'product_id' => 3,
                'order_id' => 1,
                'quantity' => 1,
                'price' => 1,
            ],
            [
                'product_id' => 4,
                'order_id' => 1,
                'quantity' => 1,
                'price' => 1,
            ],
        ]);
    }
}
