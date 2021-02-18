<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->tinyInteger('user_type')->comment('1=general user');
            $table->string('name', 254);
            $table->string('phone', 24);
            $table->tinyInteger('is_phone_verified')->default(0)->comment('1=verified, 0=unverified');
            $table->string('email', 254);
            $table->tinyInteger('is_email_verified')->default(0)->comment('1=verified, 0=unverified');
            $table->string('password', 100)->comment('Has/Encoded Password');
            $table->string('image', 254);
            $table->rememberToken();
            $table->mediumText('android_token');
            $table->text('android_device_id');
            $table->string('verification_code', 10)->comment('to verify user through phone/email');
            $table->tinyInteger('gender')->default(1)->comment('1=Male, 2=Female, 3=Common');
            $table->timestamp('birthday')->nullable();
            $table->string('lat_long_home', 100);
            $table->mediumText('address_home');
            $table->string('lat_long_office', 100);
            $table->text('address_office');
            $table->timestamp('last_login')->useCurrent();
            $table->timestamp('last_logout')->nullable();
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('modified_at')->useCurrent();
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3=BlockByAdmin');
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
}
