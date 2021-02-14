<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_color', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name_en', 50);
            $table->string('name_bn', 50);
            $table->string('image', 150);
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin ');
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
        Schema::dropIfExists('p_color');
    }
}
