<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldContraintToPresences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->bigInteger('eleve_id')->nullable()->unsigned();
            $table->bigInteger('professeur_id')->nullable()->unsigned();
            $table->integer('matieres_id')->nullable()->unsigned();
            $table->integer('classes_id')->nullable()->unsigned();
            $table->foreign('eleve_id')->references('id')->on('users');
            $table->foreign('professeur_id')->references('id')->on('users');
            $table->foreign('matieres_id')->references('id')->on('matieres');
            $table->foreign('classes_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presences', function (Blueprint $table) {
            //
        });
    }
}
