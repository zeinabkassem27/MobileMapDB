<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('expert_id')->unsigned();
            $table->foreign('expert_id')->references('id')->on('expert');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_company');
    }
}
