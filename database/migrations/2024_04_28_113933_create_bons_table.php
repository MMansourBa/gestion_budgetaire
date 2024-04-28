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
        Schema::create('bons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('depense_id');
            $table->foreign('depense_id')->references('id')->on('depenses');
            $table->integer('classe');
            $table->foreign('classe')->references('classe')->on('comptes');
            $table->integer('cp');
            $table->foreign('cp')->references('cp')->on('comptes');
            $table->integer('cd')->nullable();
            $table->integer('numero_compte');
            $table->foreign('numero_compte')->references('numero_compte')->on('comptes');
            $table->string('intitules');
            $table->foreign('intitules')->references('intitules')->on('comptes');
            $table->integer('credits_alloues');
            $table->foreign('credits_alloues')->references('credits_alloues')->on('budgets');
            $table->string('numero_bon')->unique();
            $table->string('beneficiaire');
            $table->integer('montant');
            $table->integer('qte');
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
        Schema::dropIfExists('bons');
    }
};
