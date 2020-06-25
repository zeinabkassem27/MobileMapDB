<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('image_id')->unsigned();
            $table->integer('accident_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('image');
            $table->foreign('accident_id')->references('id')->on('accident');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accident_image');
    }
}
