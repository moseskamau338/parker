<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesHandoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_handovers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id');
            $table->foreignId('to');
            $table->foreignId('from');
            $table->double('cash_at_hand');
            $table->double('cash_at_bank');
            $table->double('amount_transferred');
            $table->boolean('approved')->nullable();
            $table->foreignId('approved_by')->nullable();
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
        Schema::dropIfExists('sales_handovers');
    }
}
