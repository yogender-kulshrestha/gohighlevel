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
        Schema::create('coupon_ads_available', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coupon_ad_id')->unsigned();
            $table->foreign('coupon_ad_id')->references('id')->on('coupon_ads')->onDelete('cascade');
            $table->bigInteger('available_id')->unsigned();
            $table->foreign('available_id')->references('id')->on('availables')->onDelete('cascade');
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
        Schema::dropIfExists('coupon_ads_available');
    }
};
