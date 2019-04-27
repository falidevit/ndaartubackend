<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInternalContraintsFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('parent_id')->nullable()->unsigned();
            $table->bigInteger('eleve_id')->nullable()->unsigned();
            $table->bigInteger('professeur_id')->nullable()->unsigned();
            $table->bigInteger('surveillant_id')->nullable()->unsigned();
            $table->foreign('parent_id')->references('id')->on('users');
            $table->foreign('eleve_id')->references('id')->on('users');
            $table->foreign('professeur_id')->references('id')->on('users');
            $table->foreign('surveillant_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
