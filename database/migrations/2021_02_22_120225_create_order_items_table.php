<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('item_id');
            $table->double('item_cost', 6, 2)->comment('price');
            $table->double('item_offer', 6, 2)->comment('amount like 100');
            $table->double('weight', 6, 2)->comment('5 kg');
            $table->string('weight_unit', 20)->comment('kg, gram');
            $table->integer('quantity');
            $table->bigInteger('order_id');
            $table->timestamp('create_at')->useCurrent();
            $table->string('p_code', 254)->comment('p_code found on product image');
            $table->string('p_color_ids', 254)->comment('comma separated color id');
            $table->string('p_sizes', 254)->comment('42, L, M');
            $table->string('p_warranty', 20)->comment('time');
            $table->integer('p_warranty_details');
            $table->string('p_width', 50);
            $table->string('p_height', 50);
            $table->string('p_width_height_unit', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
