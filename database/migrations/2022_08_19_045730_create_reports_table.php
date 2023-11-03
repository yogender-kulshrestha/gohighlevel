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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_by')->unsigned();
            $table->foreign('user_by')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_to')->unsigned();
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('report_reason_id')->unsigned();
            $table->foreign('report_reason_id')->references('id')->on('report_reasons')->onDelete('cascade');
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('reports');
    }
};
