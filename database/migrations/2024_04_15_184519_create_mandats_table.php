<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('somme');
            $table->integer('annee');
            $table->date('date');
            $table->integer('numero_be');
            $table->foreign('numero_be')->references('numero')->on('bon_engagements');
            $table->integer('numero_mandat');
            $table->integer('classe');
            $table->integer('cp');
            $table->integer('cd');
            $table->integer('compte');
            $table->text('objet');
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
        Schema::dropIfExists('mandats');
    }
};
