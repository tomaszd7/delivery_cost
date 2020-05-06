<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('value_delivery_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->string('client_group')->nullable();
            $table->string('payment')->nullable();
            $table->float('value_from');
            $table->float('value_to');
            $table->float('cost');

            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::create('weight_delivery_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->string('client_group')->nullable();
            $table->string('payment')->nullable();
            $table->float('weight_from');
            $table->float('weight_to');
            $table->float('cost');

            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::create('quantity_delivery_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->string('client_group')->nullable();
            $table->string('payment')->nullable();
            $table->float('quantity_from');
            $table->float('quantity_to');
            $table->float('cost');

            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_delivery_costs');
        Schema::dropIfExists('weight_delivery_costs');
        Schema::dropIfExists('value_delivery_costs');
    }
}
