<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('user_id')->default(0);
            $table->integer('store_id')->default(0);
            $table->tinyInteger('destination')->default(1)->comment('1=user, 2=store, 3=admin, 4= promotional , 5=all');
            $table->tinyInteger('seen_status')->default(0)->comment('0=unseen, 1= seen ');
            $table->text('title');
            $table->text('message');
            $table->text('data');
            $table->integer('on_click')->comment('0=default, 1=order status, 2= promotion ads, 3=');
            $table->integer('on_click_data_id')->comment('order/ads id to view details ');
            $table->string('image', 150);
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin');
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
        Schema::dropIfExists('notification');
    }
}
