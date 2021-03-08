<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_ads', function (Blueprint $table) {
            $table->integer('id', true);
            $table->tinyInteger('ads_type')->default(1)->comment('1=store, 2=product, 3=brands');
            $table->tinyInteger('discount_type')->default(1)->comment('1=percentage, 2=amount');
            $table->double('discount', 6, 2)->default(0.00);
            $table->integer('min_order_amount')->default(0)->comment('minimum amount to get the discount');
            $table->string('image', 150);
            $table->string('start_date', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->string('end_date', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin ');
            $table->tinyInteger('verify_status')->default(0)->comment('0=unverified, 1=verified, 2=deleted , 3= deletedByAdmin 	');
            $table->timestamp('create_at')->useCurrent();
            $table->string('modified_at', 35)->comment('yyyy-MM-dd HH:mm:ss');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_ads');
    }
}
