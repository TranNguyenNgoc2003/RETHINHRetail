<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->double('shipping_fee');
            $table->double('discount');
            $table->double('total_price');
            $table->string('status');
            $table->unsignedInteger('detail_order_id');
            $table->foreign('detail_order_id')->references('id')->on('detail_orders');
            $table->unsignedInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payment'); 
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
