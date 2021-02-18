<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 254);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('image_logo', 150);
            $table->string('image_cover', 150);
            $table->string('image_banner_ads', 150);
            $table->integer('district_id');
            $table->integer('upazila_id');
            $table->integer('location_id');
            $table->text('address');
            $table->string('lat_long', 30)->default('0.0,0.0');
            $table->string('payment_type', 10)->default('1')->comment('1=cashon, 2=bkash, 3=card');
            $table->smallInteger('service_tax')->default(0)->comment('Tax in percentage');
            $table->double('admin_commission', 6, 2)->default(5.00)->comment('contract with admin');
            $table->text('bank_account_details');
            $table->integer('cancel_time')->default(30)->comment('time in munites  30min');
            $table->integer('return_time')->default(48)->comment('customer can return and store accept. time in hours');
            $table->integer('courier_delivery_time')->default(72)->comment('time in hours 72h=3days');
            $table->integer('home_delivery_time')->default(48)->comment('time in hours 48h=2days');
            $table->text('home_delivery_address_ids')->comment('location_ids');
            $table->integer('home_delivery_charge')->default(100);
            $table->integer('courier_delivery_charge')->default(100);
            $table->string('verification_code', 20);
            $table->smallInteger('store_type');
            $table->string('open_close_time', 20)->default('09:00 AM,08:00 PM');
            $table->string('off_days', 100)->comment('comma separated day name');
            $table->string('last_login', 35)->comment('yyyy-MM-dd HH:mm:ss ');
            $table->string('last_logout', 35)->comment('yyyy-MM-dd HH:mm:ss ');
            $table->text('android_token');
            $table->string('android_device_id', 254);
            $table->string('discount_start_date', 35)->comment('yyyy-MM-dd HH:mm:ss ');
            $table->string('discount_end_date', 35)->comment('yyyy-MM-dd HH:mm:ss ');
            $table->tinyInteger('discount_type')->default(1)->comment('1=percentage, 2=amount ');
            $table->double('discount', 6, 2)->comment('amount or percentage');
            $table->integer('minimum_order_amount');
            $table->tinyInteger('is_splash_store')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('is_promoted_store')->default(0)->comment('0=no, 1=yes');
            $table->integer('promoted_store_serial')->default(100);
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin 	');
            $table->tinyInteger('verify_status')->default(0)->comment('0=unverified, 1=verified, 2=deleted , 3= deletedByAdmin ');
            $table->timestamp('create_at')->useCurrent();
            $table->string('modified_at', 35)->comment('yyyy-MM-dd HH:mm:ss ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
