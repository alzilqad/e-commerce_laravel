<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_reviews', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('store_id');
            $table->bigInteger('order_id');
            $table->tinyInteger('ratings')->default(5)->comment('given ratting out of 5');
            $table->text('comments');
            $table->tinyInteger('active_status')->default(1)->comment(' 	0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin ');
            $table->timestamp('create_at')->useCurrent()->comment('yyyy-MM-dd HH:mm:ss ');
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
        Schema::dropIfExists('store_reviews');
    }
}
