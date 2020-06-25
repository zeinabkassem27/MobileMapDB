<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_expert', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('comment')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('accident_id')->unsigned();
            $table->integer('expert_id')->unsigned();
            $table->foreign('accident_id')->references('id')->on('accident');
            $table->foreign('expert_id')->references('id')->on('expert');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accident_expert');
    }
}
