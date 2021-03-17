<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_field_id');
            $table->foreign('project_field_id')->references('id')->on('project_fields');
            $table->string('value_code', 20);
            $table->string('value_text', 100);
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
        Schema::dropIfExists('select_values');
    }
}
