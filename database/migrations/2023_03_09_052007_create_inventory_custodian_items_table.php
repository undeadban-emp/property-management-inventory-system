<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_custodian_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ic_id');
            $table->integer('item_id');
            $table->integer('quantity');
            $table->string('unit');
            $table->decimal('unit_cost');
            $table->decimal('unit_total_cost');
            $table->string('est_useful_life');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_custodian_items');
    }
};