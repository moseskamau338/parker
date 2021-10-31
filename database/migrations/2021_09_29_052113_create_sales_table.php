<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('user_id');
            $table->foreignId('rate_id');
            $table->foreignId('zone_id');
            $table->foreignId('gateway_id')->nullable();
            $table->timestamp('entry_time');
            $table->timestamp('leave_time')->nullable();
            $table->string('status')->default('PENDING'); //CANCELED,PAID,PENDING
            $table->text('totals')->nullable();
            $table->text('qr')->nullable();
            $table->timestamp('payed_at')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
