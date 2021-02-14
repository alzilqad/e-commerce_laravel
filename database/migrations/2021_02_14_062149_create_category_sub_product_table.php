<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySubProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_sub_product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id')->default(0);
            $table->integer('sub_category_id')->default(0);
            $table->integer('sub_category_count')->default(0);
            $table->string('name_en', 50);
            $table->string('name_bn', 50);
            $table->text('description');
            $table->string('image', 150);
            $table->string('cover_image', 150);
            $table->tinyInteger('is_promoted')->default(0)->comment('0= no, 1=yes');
            $table->integer('promoted_serial')->comment('serial to view on user side');
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin');
            $table->tinyInteger('verify_status')->default(0)->comment('0=unverified, 1=verified, 2=deleted , 3= deletedByAdmin ');
            $table->timestamp('create_at')->useCurrent();
            $table->string('modified_at', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->tinyInteger('created_by')->default(1)->comment('1= admin, 2= store manager');
            $table->integer('creator_id')->default(0)->comment('admin/store id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_sub_product');
    }
}
