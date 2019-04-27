<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->string('label');
            $table->bigInteger('surveillant_id')->unsigned();
            $table->integer('etablissements_id')->unsigned();
            $table->timestamps();
            $table->foreign('surveillant_id')->references('id')->on('users');
            $table->foreign('etablissements_id')->references('id')->on('etablissements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classes');
    }
}
