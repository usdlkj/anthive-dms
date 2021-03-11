<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thread_starter_id')->nullable();
            $table->foreign('thread_starter_id')->references('id')->on('mails');
            $table->unsignedBigInteger('previous_mail_id')->nullable();
            $table->foreign('previous_mail_id')->references('id')->on('mails');
            $table->unsignedBigInteger('mail_type_id')->nullable();
            $table->foreign('mail_type_id')->references('id')->on('mail_types');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->string('mail_code');
            $table->unsignedTinyInteger('mail_status');
            $table->string('subject');
            $table->text('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
