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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('depense_id');
            $table->foreign('depense_id')->references('id')->on('depenses');
            $table->integer('numero_compte');
            $table->foreign('numero_compte')->references('numero_compte')->on('comptes');
            $table->string('intitules');
            $table->foreign('intitules')->references('intitules')->on('comptes');
            $table->integer('credits_alloues');
            $table->foreign('credits_alloues')->references('credits_alloues')->on('budgets');
            $table->integer('numero_bon')->nullable();
            $table->string('intitule')->nullable();
            $table->integer('montant')->nullable();
            $table->integer('payes')->nullable();
            $table->date('date');
            // $table->integer('solde_disponible')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
