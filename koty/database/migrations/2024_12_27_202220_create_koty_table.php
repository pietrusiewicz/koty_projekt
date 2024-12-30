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
			$table->foreignId('wlasciciel_id')->constrained('uzytkownicy'); // Powiązanie z użytkownikami
			$table->foreignId('kategoria_id')->constrained('kategorie')->onDelete('set null');  // Relacja z tabelą kategorie
			$table->text('opis')->nullable();
			$table->timestamps();
			
			$table->foreign('wlasciciel_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
			$table->foreign('kategoria_id')->references('id')->on('kategorie')->onDelete('cascade');
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
