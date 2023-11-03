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
        Schema::create('coupon_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('code');
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->text('image')->nullable();
            $table->bigInteger('min_age')->default(0);
            $table->bigInteger('max_age')->default(100);
            $table->string('url')->nullable();
            $table->bigInteger('click_count')->default(0);
            $table->bigInteger('view_count')->default(0);
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
        Schema::dropIfExists('coupon_ads');
    }
};
