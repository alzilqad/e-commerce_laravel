<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('store_id');
            $table->integer('user_id');
            $table->double('total_amount', 7, 2);
            $table->timestamp('create_at')->useCurrent();
            $table->string('modified_at', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->tinyInteger('modified_by')->comment('1=admin, 2=store, 3=user');
            $table->tinyInteger('order_accept_by')->comment('1=admin, 2=store');
            $table->string('order_status', 35)->default('pending')->comment('pending, accepted, processing, onway, couriered, delivered, cancelled, returned ');
            $table->tinyInteger('delivery_status')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('refund_status')->default(0)->comment('0=no, 1=yes');
            $table->integer('coupon_id')->default(0);
            $table->double('coupon_amount', 6, 2);
            $table->double('product_discount', 6, 2);
            $table->double('delivery_charge', 6, 2);
            $table->double('delivery_charge_discount', 6, 2);
            $table->double('service_tax', 6, 2);
            $table->text('special_request')->comment('user requests to delivery product');
            $table->string('invoice_id', 50);
            $table->double('admin_commission', 6, 2);
            $table->double('payment_gateway_commission', 6, 2);
            $table->text('delivery_instructions')->comment('how can delivery boy reach');
            $table->tinyInteger('delivery_type')->comment('1=HomeDelivery, 2=Courier');
            $table->text('delivery_address');
            $table->text('courier_address');
            $table->string('delivery_slot', 35)->comment('8AM-10AM, 10AM-12PM');
            $table->tinyInteger('order_type')->default(1)->comment('1=FinalOrder, 2=PreOrder ');
            $table->tinyInteger('payment_type')->default(1)->comment('1=cashon, 2=online');
            $table->tinyInteger('payment_status')->default(0)->comment('0=unpaid, 1=paid');
            $table->string('payment_gateway_name', 35)->comment('COD, bKash, card, rocket etc');
            $table->string('flexible_delivery_date', 35)->comment('when preorder, user set the possible delivery date   yyyy-MM-dd HH:mm:ss');
            $table->text('order_comments')->comment('status update comments');
            $table->double('admin_commission_percentage', 3, 2);
            $table->integer('driver_id');
            $table->integer('courier_address_id');
            $table->string('driver_assigning_time', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->string('transaction_id', 100);
            $table->string('prescription_image', 150);
            $table->text('item_list');
            $table->double('store_commission', 6, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
