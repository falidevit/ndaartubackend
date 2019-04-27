<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbsencesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->increments('id');
            $table->DATE('date');
            $table->TIME('heure');
            $table->bigInteger('eleve_id')->unsigned();
            $table->integer('classes_id')->unsigned();
            $table->integer('matieres_id')->unsigned();
            $table->integer('annees_id')->unsigned();
            $table->timestamps();
            $table->foreign('eleve_id')->references('id')->on('users');
            $table->foreign('classes_id')->references('id')->on('classes');
            $table->foreign('matieres_id')->references('id')->on('matieres');
            $table->foreign('annees_id')->references('id')->on('annees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('absences');
    }
}
