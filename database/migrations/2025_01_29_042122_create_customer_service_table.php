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
        Schema::create('customer_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name');
            $table->boolean('service_type');
            $table->string('username');
            $table->string('phone');
            $table->string('email');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('note');
            $table->unsignedInteger('spworker_id');
            $table->foreign('spworker_id')->references('id')->on('support_worker');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_service');
    }
};
