<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('store_id');
            $table->integer('brand_id');
            $table->integer('category_product_id');
            $table->integer('category_sub_product_id');
            $table->integer('weight_class_id');
            $table->double('weight', 4, 2);
            $table->string('weight_unit', 10);
            $table->double('buying_price', 8, 2);
            $table->double('original_price', 8, 2);
            $table->double('discount_price', 8, 2);
            $table->integer('discount')->default(0)->comment('discount in percentage');
            $table->tinyInteger('stock_status')->comment('0=stock out, 1=in stock');
            $table->integer('in_stock')->comment('how many available');
            $table->integer('total_sell')->comment('increase in every order');
            $table->tinyInteger('verify_status')->comment('0=unverified, 1=verified, 2=deleted , 3= deletedByAdmin ');
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin 	');
            $table->integer('courier_charge')->default(0);
            $table->integer('home_delivery_charge')->default(0);
            $table->string('name_en', 254);
            $table->string('name_bn', 254);
            $table->text('description');
            $table->tinyInteger('is_flash_product')->default(0)->comment('0=no, 1=yes');
            $table->integer('flash_discount')->default(0)->comment('discount in percentage');
            $table->tinyInteger('is_flash_verified')->default(0)->comment('0=no, 1=yes');
            $table->timestamp('create_at')->useCurrent();
            $table->string('modified_at', 35)->comment('yyyy-MM-dd HH:mm:ss ');
            $table->string('p_code', 20);
            $table->text('p_colors');
            $table->text('p_sizes');
            $table->string('p_warranty', 20)->default('0');
            $table->text('p_warranty_details');
            $table->double('p_width', 3, 2)->default(0.00);
            $table->double('p_height', 3, 2);
            $table->string('p_width_height_unit', 10)->comment('inch, cm feet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
