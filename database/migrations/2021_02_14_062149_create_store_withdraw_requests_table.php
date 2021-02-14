<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreWithdrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_withdraw_requests', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('store_id');
            $table->integer('admin_id')->default(0);
            $table->double('request_amount', 8, 2);
            $table->double('approved_amount', 8, 2)->default(0.00);
            $table->double('balance_request_time', 8, 2)->comment('balance when requests send');
            $table->double('balance_after_withdraw', 8, 2);
            $table->tinyInteger('approve_status')->default(0)->comment('0=pending, 1=accepted, 2=rejected, 3=deleted by admin');
            $table->string('transaction_id', 50)->default('');
            $table->string('transaction_date', 35)->comment('yyyy-MM-dd HH:mm:ss ');
            $table->string('image', 150);
            $table->tinyInteger('created_by')->comment(' 	1= admin, 2= store manager');
            $table->integer('creator_id')->comment('admin/store');
            $table->timestamp('create_at')->useCurrent();
            $table->string('modified_at', 35)->comment('yyyy-MM-dd HH:mm:ss ');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_withdraw_requests');
    }
}
