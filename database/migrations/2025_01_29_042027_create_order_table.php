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
            $table->string('full_name');
            $table->string('address');
            $table->string('phone');
            $table->double('price_total');
            $table->double('price_ship');
            $table->string('status');
            $table->string('delivery');
            $table->boolean('pay');
            $table->dateTime('create_time');
            $table->unsignedInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('cart');
            $table->unsignedInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupon');
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
