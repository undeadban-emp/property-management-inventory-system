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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_no', 50);
            $table->string('description');
            $table->string('unit');
            $table->string('model_no');
            $table->string('serial_no');
            $table->string('brand');
            $table->date('acquisition_date');
            $table->decimal('acquisition_cost');
            $table->decimal('market_appraisal');
            $table->date('appraisal_date');
            $table->string('remarks');
            $table->foreignId('class_id');
            $table->string('nature_occupancy');
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
        Schema::dropIfExists('items');
    }
};