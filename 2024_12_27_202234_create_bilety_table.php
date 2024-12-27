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
    Schema::create('bilety', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('klient_id');
        $table->unsignedBigInteger('wystawa_id');
        $table->string('rodzaj_biletu');
        $table->decimal('cena', 8, 2);
        $table->date('data_zakupu');
        $table->timestamps();

        $table->foreign('klient_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
        $table->foreign('wystawa_id')->references('id')->on('wystawy')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bilety');
    }
};
