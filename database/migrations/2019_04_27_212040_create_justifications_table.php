<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJustificationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justifications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('motif');
            $table->string('preuve_path');
            $table->integer('absences_id')->unsigned();
            $table->timestamps();
            $table->foreign('absences_id')->references('id')->on('absences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('justifications');
    }
}
