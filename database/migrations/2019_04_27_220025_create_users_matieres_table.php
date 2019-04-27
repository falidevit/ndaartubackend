<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersMatieresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_matieres', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('eleve_id')->nullable()->unsigned();
            $table->bigInteger('professeur_id')->nullable()->unsigned();
            $table->integer('matieres_id')->unsigned();
            $table->foreign('eleve_id')->references('id')->on('users');
            $table->foreign('professeur_id')->references('id')->on('users');
            $table->foreign('matieres_id')->references('id')->on('matieres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_matieres');
    }
}
