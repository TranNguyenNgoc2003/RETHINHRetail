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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_product');
            $table->double('price')->nullable();
            $table->string('option_cpu')->nullable();
            $table->string('option_gpu')->nullable();
            $table->string('option_ram')->nullable();
            $table->string('option_hard')->nullable();
            $table->double('rating')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total_product')->nullable();
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->string('Screen_size')->nullable();
            $table->string('Panel_material')->nullable();
            $table->string('Screen_resolution')->nullable();
            $table->string('Screen_features')->nullable();
            $table->string('Screen_ratio')->nullable();
            $table->string('Rear_camera')->nullable();
            $table->string('Video_recording')->nullable();
            $table->string('Front_camera')->nullable();
            $table->string('CPU')->nullable();
            $table->string('GPU')->nullable();
            $table->string('RAM_capacity')->nullable();
            $table->string('Hard_capacity')->nullable();
            $table->string('Operating_system')->nullable();
            $table->string('Size')->nullable();
            $table->string('Weight')->nullable();
            $table->string('Material')->nullable();
            $table->string('Tech_Utilities')->nullable();
            $table->string('Sound_tech')->nullable();
            $table->string('Charging_tech')->nullable();
            $table->string('WiFi')->nullable();
            $table->string('Bluetooth')->nullable();
            $table->string('Pin')->nullable();
            $table->string('Release_date')->nullable();
            $table->string('Producer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
