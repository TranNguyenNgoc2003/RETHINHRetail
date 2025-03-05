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
            $table->double('total_price');
            $table->double('shipping_fee');
            $table->string('status');
            $table->boolean('pay');
            $table->unsignedInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupon');
            $table->unsignedInteger('deliveries_id');
            $table->foreign('deliveries_id')->references('id')->on('deliveries');
            $table->unsignedInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payment');
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
