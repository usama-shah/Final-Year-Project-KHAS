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
        Schema::create('return_completed', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phone_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('return_by')->nullable();
            $table->string('status')->nullable();
            $table->string('payment')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('phone_id')->references('id')->on('phones');

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
