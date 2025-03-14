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
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fullname')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->double('price')->nullable();
            $table->double('shipping_fee')->nullable();
            $table->double('discount')->nullable();
            $table->double('total_price')->nullable();
            $table->string('status')->nullable();
            $table->enum('payment_status', ['Chờ xử lý', 'Đã thanh toán', 'Thất bại', 'Đã hoàn tiền'])->default('Chờ xử lý');
            $table->enum('shipping_status', ['Đang giao','Đã giao hàng', 'Thất bại', 'Đã hoàn hàng'])->default('Đang giao');            
            $table->boolean('is_completed')->default(false);
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
