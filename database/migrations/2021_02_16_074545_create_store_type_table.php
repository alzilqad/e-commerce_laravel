<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_type', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name_en', 30);
            $table->string('name_bn', 30);
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deleted');
            $table->string('image', 150);
            $table->text('description');
            $table->string('create_at', 35)->comment('yyyy-MM-dd HH:mm:ss');
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
        Schema::dropIfExists('store_type');
    }
}
