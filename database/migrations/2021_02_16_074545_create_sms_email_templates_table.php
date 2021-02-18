<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_email_templates', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email_from', 254)->comment('Company name/store name');
            $table->text('subject');
            $table->text('email_content');
            $table->text('sms_content');
            $table->timestamp('create_at')->useCurrent();
            $table->string('modified_at', 35)->comment('yyyy-MM-dd HH:mm:ss');
            $table->string('template_name', 254)->comment('password/notification/registration/subscribe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_email_templates');
    }
}
