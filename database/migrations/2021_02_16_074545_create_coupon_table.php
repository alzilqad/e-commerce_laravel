<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('keyword', 20);
            $table->tinyInteger('discount_type')->default(1)->comment('1=percentage, 2=amount ');
            $table->double('discount', 6, 2)->comment('percentage or amount like 5, 100');
            $table->integer('min_order_amount')->default(0)->comment('minimum amount to get the discount ');
            $table->string('image', 150);
            $table->integer('instock')->default(0)->comment('decrease in every use');
            $table->integer('total_used')->default(0)->comment('increase in every use');
            $table->tinyInteger('created_by')->default(1)->comment('1= admin, 2= store manager ');
            $table->integer('creator_id')->default(0);
            $table->string('start_date', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->string('end_date', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->tinyInteger('active_status')->default(1)->comment(' 	0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin ');
            $table->tinyInteger('verify_status')->default(0)->comment('0=unverified, 1=verified, 2=deleted , 3= deletedByAdmin ');
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
        Schema::dropIfExists('coupon');
    }
}
