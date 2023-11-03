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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_by')->unsigned();
            $table->foreign('user_by')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_to')->unsigned();
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->enum('message_type', ['text', 'image', 'audio', 'video'])->default('text');
            $table->text('message');
            $table->enum('status', ['seen', 'unseen'])->default('unseen');
            $table->timestamps();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};
