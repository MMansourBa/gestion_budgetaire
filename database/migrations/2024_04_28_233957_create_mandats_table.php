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
            $table->string('numero_mandat');
            $table->foreign('numero_mandat')->references('numero_bon')->on('bon_engagements');
            $table->string('objet');
            $table->foreign('objet')->references('intitules')->on('bon_engagements');
            $table->string('beneficiaire'); 
            $table->foreign('beneficiaire')->references('beneficiaire')->on('bon_engagements');
            $table->integer('montant');
            $table->foreign('montant')->references('montant')->on('bon_engagements');
            $table->date('date');
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
