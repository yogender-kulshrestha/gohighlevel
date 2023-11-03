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
        Schema::create('monogamies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_by')->unsigned();
            $table->foreign('user_by')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_to')->unsigned();
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_super_monogamy')->default(false);
            $table->boolean('status')->default(true);
            $table->bigInteger('unset_by')->index()->nullable();
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
        Schema::dropIfExists('monogamies');
    }
};
