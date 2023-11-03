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
        Schema::create('coupon_ads_interest', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coupon_ad_id')->unsigned();
            $table->foreign('coupon_ad_id')->references('id')->on('coupon_ads')->onDelete('cascade');
            $table->bigInteger('interest_id')->unsigned();
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
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
        Schema::dropIfExists('coupon_ads_interest');
    }
};
