<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasicTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product_1',
                'description' => 'value calc',
                'weight' => 5,
                'calculate_value_cost' => true,
                'calculate_weight_cost' => false,
                'calculate_quantity_cost' => false,
                'calculate_individual_cost' => false,
                'cost_per_piece' => 1,
                'flat_cost' => 0
            ],
            [
                'name' => 'Product_2',
                'description' => 'weight calc',
                'weight' => 10,
                'calculate_value_cost' => false,
                'calculate_weight_cost' => true,
                'calculate_quantity_cost' => false,
                'calculate_individual_cost' => false,
                'cost_per_piece' => 1,
                'flat_cost' => 0
            ],
            [
                'name' => 'Product_3',
                'description' => 'quantity calc',
                'weight' => 5,
                'calculate_value_cost' => false,
                'calculate_weight_cost' => false,
                'calculate_quantity_cost' => true,
                'calculate_individual_cost' => false,
                'cost_per_piece' => 0,
                'flat_cost' => 10
            ],
            [
                'name' => 'Product_4',
                'description' => 'indiv calc',
                'weight' => 15,
                'calculate_value_cost' => false,
                'calculate_weight_cost' => false,
                'calculate_quantity_cost' => false,
                'calculate_individual_cost' => true,
                'cost_per_piece' => 1,
                'flat_cost' => 10
            ],
        ]);

        DB::table('clients')->insert([
            [
                'name' => 'Client_1',
                'group' => 'A',
                'payment' => 'cash'
            ],
            [
                'name' => 'Client_2',
                'group' => 'B',
                'payment' => 'check'
            ],
        ]);


        DB::table('value_delivery_costs')->insert([
            [
                'client_id' => null,
                'client_group' => null,
                'payment' => null,
                'value_from' => 0.01,
                'value_to' => 10,
                'cost' => 10,
            ],
            [
                'client_id' => null,
                'client_group' => null,
                'payment' => null,
                'value_from' => 10.01,
                'value_to' => 100,
                'cost' => 30,
            ],
            [
                'client_id' => null,
                'client_group' => 'A',
                'payment' => null,
                'value_from' => 100.01,
                'value_to' => 1000,
                'cost' => 40,
            ],
        ]);


        DB::table('weight_delivery_costs')->insert([
            [
                'client_id' => null,
                'client_group' => null,
                'payment' => null,
                'weight_from' => 0.01,
                'weight_to' => 10,
                'cost' => 5,
            ],
            [
                'client_id' => null,
                'client_group' => null,
                'payment' => null,
                'weight_from' => 10.01,
                'weight_to' => 1000,
                'cost' => 50,
            ]
        ]);


        DB::table('quantity_delivery_costs')->insert([
            [
                'client_id' => null,
                'client_group' => null,
                'payment' => null,
                'quantity_from' => 0.01,
                'quantity_to' => 10,
                'cost' => 2,
            ],
            [
                'client_id' => null,
                'client_group' => null,
                'payment' => null,
                'quantity_from' => 10.01,
                'quantity_to' => 1000,
                'cost' => 20,
            ],
            [
                'client_id' => null,
                'client_group' => 'A',
                'payment' => null,
                'quantity_from' => 1000.01,
                'quantity_to' => 10000,
                'cost' => 15,
            ]
        ]);
    }
}
