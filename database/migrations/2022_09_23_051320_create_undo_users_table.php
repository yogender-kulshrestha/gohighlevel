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
        Schema::create('undo_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_by')->unsigned();
            $table->foreign('user_by')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_to')->unsigned();
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['0','1','2'])->default('0')->comment('0 not like, 1 like, 2 both');
            $table->boolean('is_super_like')->default(false)->comment('1 yes, 0 no');
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
        Schema::dropIfExists('undo_users');
    }
};
