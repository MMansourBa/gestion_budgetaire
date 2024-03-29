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
            $table->integer('numero_compte');
            $table->string('intitule');
            $table->integer('credits_alloues');
            $table->integer('numero_depense')->nullable();
            $table->string('titre_depense')->nullable();
            $table->unsignedBigInteger('depense_id');
            $table->foreign('depense_id')->references('id')->on('depenses');
            $table->integer('montant')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
