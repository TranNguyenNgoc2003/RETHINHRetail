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
            $table->double('rating')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total_product')->nullable();
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->string('Screen_size')->nullable();
            $table->string('Panel_material')->nullable();
            $table->string('Display_tech')->nullable();
            $table->string('Screen_resolution')->nullable();
            $table->string('Screen_features')->nullable();
            $table->string('Screen_ratio')->nullable();
            $table->string('Rear_camera')->nullable();
            $table->string('Video_recording')->nullable();
            $table->string('Camera_features')->nullable();
            $table->string('Front_camera')->nullable();
            $table->string('Record_video_first')->nullable();
            $table->string('CPU')->nullable();
            $table->string('GPU')->nullable();
            $table->string('NFC')->nullable();
            $table->string('SIM_card')->nullable();
            $table->string('Network_support')->nullable();
            $table->string('GPS')->nullable();
            $table->string('RAM_capacity')->nullable();
            $table->string('RAM_Type')->nullable();
            $table->string('RAM_slots')->nullable();
            $table->string('Hard_drive')->nullable();
            $table->string('Operating_system')->nullable();
            $table->string('Case_type')->nullable();
            $table->string('Size')->nullable();
            $table->string('Weight')->nullable();
            $table->string('Material')->nullable();
            $table->string('Compatibility')->nullable();
            $table->string('Resistance')->nullable();
            $table->string('Tech_Utilities')->nullable();
            $table->string('Other_utilities')->nullable();
            $table->string('Sound_tech')->nullable();
            $table->string('Charging_tech')->nullable();
            $table->string('Charging_port')->nullable();
            $table->string('Communication_port')->nullable();
            $table->string('Power_consumption')->nullable();
            $table->string('Types_sensors')->nullable();
            $table->string('WiFi')->nullable();
            $table->string('Bluetooth')->nullable();
            $table->string('Pin')->nullable();
            $table->string('Health_benefits')->nullable();
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
