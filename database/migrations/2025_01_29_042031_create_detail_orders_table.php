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
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('order');
            $table->string('name_product');
            $table->string('option_cpu')->nullable();
            $table->string('option_gpu')->nullable();
            $table->string('option_ram')->nullable();
            $table->string('option_hard')->nullable();
            $table->integer('count');
            $table->string('total_price');
            $table->unsignedInteger('cart_id')->nullable();
            $table->foreign('cart_id')->references('id')->on('cart');
            $table->unsignedInteger('payment_id')->nullable();
            $table->foreign('payment_id')->references('id')->on('payment');
            $table->unsignedInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupon');
            $table->unsignedInteger('deliveries_id')->nullable();
            $table->foreign('deliveries_id')->references('id')->on('deliveries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
