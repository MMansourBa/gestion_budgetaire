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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->integer('classe');
            $table->integer('cp');
            $table->integer('cd')->nullable();
            $table->integer('numero_compte')->unique();
            $table->string('intitules')->unique();
            $table->unsignedBigInteger('depense_id');
            $table->foreign('depense_id')->references('id')->on('depenses');
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
        Schema::dropIfExists('comptes');
    }
};
