<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handovers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id');
            $table->double('cash_at_hand');
            $table->double('total_sales');
            $table->integer('completed_sales_count');
            $table->integer('incomplete_sales_count');
            $table->boolean('approved')->nullable();
            $table->foreignId('approved_by')->nullable(); // user
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
        Schema::dropIfExists('handovers');
    }
}
