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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('google_id')->nullable();
            $table->text('apple_id')->nullable();
            $table->text('spotify_id')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('hide_my_age')->nullable()->default(false);
            $table->string('gender')->nullable();
//            $table->enum('gender', ['Man', 'Woman', 'Neutral'])->nullable();
            $table->boolean('show_gender')->nullable()->default(false);
            $table->string('date_with')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('looking_for')->nullable();
//            $table->enum('date_with', ['Man', 'Woman', 'Everyone'])->default('Everyone');
//            $table->enum('marital_status', ['Single', 'Married', 'Engaged', 'Divorced', 'Separated'])->nullable();
//            $table->enum('looking_for', ['Love', 'Friends', 'Fillings', 'Business'])->nullable();
            $table->text('biography')->nullable();
            $table->string('sexual_orientation')->nullable();
//            $table->integer('tall_are_you')->nullable();
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
            $table->text('real_photo')->nullable();
            $table->boolean('is_premium')->nullable()->default(false);
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('hide_my_location')->nullable()->default(false);
            $table->boolean('incognito_mode')->nullable()->default(false);
            $table->timestamp('subscription_ends_at')->nullable();
            $table->bigInteger('ghost_sticker_id')->nullable();
            $table->boolean('in_app_notifications')->nullable()->default(true);
            $table->boolean('push_notifications')->nullable()->default(true);
            $table->boolean('emails')->nullable()->default(true);
            $table->string('device_face_id')->nullable();
            $table->boolean('enable_face_id')->nullable()->default(false);
            $table->boolean('live_status')->nullable()->default(true);
            $table->timestamp('live_at')->nullable();
            $table->boolean('show_live_status')->nullable()->default(true);
            $table->boolean('allow_profile_sharing')->nullable()->default(true);
            $table->boolean('show_ads')->nullable()->default(true);
            $table->string('zegocloud_id')->nullable();
            $table->rememberToken();
            $table->boolean('status')->default(true);
            $table->boolean('hide_account')->nullable()->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
};
