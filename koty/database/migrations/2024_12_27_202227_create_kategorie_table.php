<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorieTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategorie', function (Blueprint $table) {
            $table->id(); // unikalny identyfikator
            $table->string('nazwa', 255); // nazwa kategorii
            $table->text('opis')->nullable(); // opis kategorii
            $table->timestamps(); // data utworzenia i aktualizacji
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorie');
    }
}
