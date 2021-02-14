<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_id');
            $table->integer('store_id');
            $table->integer('user_id');
            $table->string('order_status', 15)->comment('pending, accepted, processing, onway, couriered, delivered, cancelled, returned');
            $table->text('message');
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin ');
            $table->timestamp('create_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status');
    }
}
