<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->unsignedBigInteger('brand');
            $table->foreign('brand')->references('id')->on('brands');
            $table->string('model');
            $table->unsignedBigInteger('price');
            $table->string('color');
            $table->string('status')->default('Available');
            $table->integer('storage_capacity');
            $table->integer('ram');
            $table->integer('camera')->nullable();
            $table->string('original_packaging')->nullable();
            $table->string('condition')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('purchase_proof')->nullable();
            $table->string('warranty_status')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('operating_system')->nullable();
            $table->integer('battery_health')->nullable();
            $table->json('accessories')->nullable();
            $table->string('reason_for_selling')->nullable();
            $table->string('front_screen_condition')->nullable();
            $table->string('back_cover_condition')->nullable();
            $table->string('frame_edges_condition')->nullable();
            $table->string('buttons_condition')->nullable();
            $table->string('ports_condition')->nullable();
            $table->string('touchscreen_functionality')->nullable();
            $table->string('screen_damage')->nullable();
            $table->string('water_damage')->nullable();
            $table->string('battery_issues')->nullable();
            $table->string('camera_issues')->nullable();
            $table->string('audio_issues')->nullable();
            $table->string('connectivity_issues')->nullable();
            $table->string('sensor_issues')->nullable();
            $table->string('software_issues')->nullable();
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            $table->json('additional_images')->nullable();
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
        Schema::dropIfExists('phones');
    }
};
