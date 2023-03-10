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
        Schema::create('inventory_custodians', function (Blueprint $table) {
            $table->id();
            $table->string('office_code');
            $table->string('fund_id');
            $table->string('ics_no');
            $table->string('received_from');
            $table->string('received_from_pos');
            $table->string('received_by');
            $table->string('received_by_pos');
            $table->date('received_from_date');
            $table->date('received_by_date');
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
        Schema::dropIfExists('inventory_custodians');
    }
};