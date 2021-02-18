<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name_en', 50);
            $table->string('name_bn', 50);
            $table->text('description');
            $table->string('image', 150);
            $table->double('admin_commission', 3, 2)->comment('in percentange');
            $table->tinyInteger('active_status')->default(1)->comment('0=inactive, 1=active, 2=deletedByUser, 3= deletedByAdmin ');
            $table->tinyInteger('verify_status')->default(0)->comment('0=unverified, 1=verified, 2=deleted , 3= deletedByAdmin ');
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
        Schema::dropIfExists('brands');
    }
}
