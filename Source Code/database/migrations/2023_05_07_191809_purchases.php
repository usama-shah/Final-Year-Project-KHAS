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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('recivers_name');
            $table->string('recivers_email');
            $table->string('recivers_phone');
            $table->string('recivers_address');
            $table->string('recivers_city');
            $table->string('recivers_zip_code');
            $table->string('delivery_option');
            $table->string('status')->default('Pending');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');

    }
};
