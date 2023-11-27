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
        Schema::table('transactions', function (Blueprint $table) {
             $table->unsignedBigInteger('purchase_id')->after('user_id')->nullable();
             $table->unsignedBigInteger('phone_id')->after('user_id')->nullable();
             
             $table->foreign('purchase_id')->references('id')->on('purchase');
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
        Schema::table('transacrtions', function (Blueprint $table) {
            //
        });
    }
};
