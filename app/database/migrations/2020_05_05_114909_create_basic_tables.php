<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('description', 255)->nullable();
            $table->float('weight')->default(0);
            $table->boolean('calculate_value_cost')->default(false);
            $table->boolean('calculate_weight_cost')->default(false);
            $table->boolean('calculate_quantity_cost')->default(false);
            $table->boolean('calculate_individual_cost')->default(false);
            $table->float('cost_per_piece')->default(0);
            $table->float('flat_cost')->default(0);
        });


        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('group')->nullable();
            $table->string('payment');
        });


        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->string('payment');

            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('order_id');
            $table->integer('quantity');
            $table->float('price');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lines');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('products');
    }
}
