<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('koty', function (Blueprint $table) {
        $table->id();
        $table->string('nazwa');
        $table->string('rasa')->nullable();
        $table->integer('wiek')->nullable();
        $table->string('kolor')->nullable();
        $table->enum('plec', ['m', 'f']);
        $table->unsignedBigInteger('wlasciciel_id');
        $table->text('opis')->nullable();
        $table->timestamps();

        $table->foreign('wlasciciel_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koty');
    }
};