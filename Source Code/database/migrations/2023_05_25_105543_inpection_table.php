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
        Schema::create('inspection', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phone_id');
            $table->unsignedBigInteger('inspected_by');
            $table->string('brand')->nullable()->default('false');
            $table->string('model')->nullable()->default('false');
            $table->string('price')->nullable()->default('false');
            $table->string('color')->nullable()->default('false');
            $table->string('storage_capacity')->nullable()->default('false');
            $table->string('ram')->nullable()->default('false');
            $table->string('original_packaging')->nullable()->default('false');
            $table->string('condition')->nullable()->default('false');
            $table->string('purchase_date')->nullable()->default('false');
            $table->string('purchase_proof')->nullable()->default('false');
            $table->string('warranty_status')->nullable()->default('false');
            $table->string('operating_system')->nullable()->default('false');
            $table->string('battery_health')->nullable()->default('false');
            $table->string('accessories')->nullable()->default('false');
            $table->string('reason_for_selling')->nullable()->default('false');
            $table->string('front_screen_condition')->nullable()->default('false');
            $table->string('back_cover_condition')->nullable()->default('false');
            $table->string('frame_edges_condition')->nullable()->default('false');
            $table->string('buttons_condition')->nullable()->default('false');
            $table->string('ports_condition')->nullable()->default('false');
            $table->string('touchscreen_functionality')->nullable()->default('false');
            $table->string('screen_damage')->nullable()->default('false');
            $table->string('water_damage')->nullable()->default('false');
            $table->string('battery_issues')->nullable()->default('false');
            $table->string('camera_issues')->nullable()->default('false');
            $table->string('audio_issues')->nullable()->default('false');
            $table->string('connectivity_issues')->nullable()->default('false');
            $table->string('sensor_issues')->nullable()->default('false');
            $table->string('software_issues')->nullable()->default('false');
            $table->string('description')->nullable()->default('false');
            $table->string('images')->nullable()->default('false');
            $table->string('deleted_at')->nullable()->default('false');
            $table->string('imei')->nullable()->default('false');
            $table->string('pta_approved')->nullable()->default('false');
            $table->string('sim_status')->nullable()->default('false');
            $table->string('status')->nullable()->default('false');
            $table->string('message')->nullable()->default('false');
            $table->timestamps();

            $table->foreign('phone_id')->references('id')->on('phones');
            $table->foreign('inspected_by')->references('id')->on('admins');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
