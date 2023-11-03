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
        Schema::create('ghosts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('show_gender')->nullable()->default(false);
            $table->string('date_with')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('looking_for')->nullable();
            $table->text('biography')->nullable();
            $table->string('sexual_orientation')->nullable();
            $table->string('tall_are_you')->nullable();
            $table->string('tall_are_you_option')->nullable();
            $table->string('school')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('do_you_drink')->nullable();
            $table->string('do_you_smoke')->nullable();
            $table->string('feel_about_kids')->nullable();
            $table->string('education')->nullable();
            $table->string('introvert_or_extrovert')->nullable();
            $table->string('star_sign')->nullable();
            $table->string('have_pets')->nullable();
            $table->string('religion')->nullable();
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
        Schema::dropIfExists('ghosts');
    }
};
