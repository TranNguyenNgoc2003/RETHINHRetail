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
            $table->string('name_product');
            $table->integer('count');
            $table->string('total_price');
            $table->unsignedInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupon');
            $table->unsignedInteger('deliveries_id');
            $table->foreign('deliveries_id')->references('id')->on('deliveries');
            $table->unsignedInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('cart');
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
