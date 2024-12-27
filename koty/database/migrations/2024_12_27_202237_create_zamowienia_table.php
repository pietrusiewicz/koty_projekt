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
    Schema::create('zamowienia', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('klient_id');
        $table->date('data_zamowienia');
        $table->decimal('cena_calkowita', 8, 2);
        $table->enum('status', ['oczekujące', 'zrealizowane']);
        $table->enum('status_platnosci', ['oczekująca', 'zapłacona']);
        $table->timestamps();

        $table->foreign('klient_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zamowienia');
    }
};
