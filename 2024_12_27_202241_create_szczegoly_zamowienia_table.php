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
    Schema::create('szczegoly_zamowienia', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('zamowienie_id');
        $table->unsignedBigInteger('bilet_id');
        $table->integer('ilosc');
        $table->decimal('cena', 8, 2);
        $table->decimal('cena_calkowita', 8, 2);
        $table->timestamps();

        $table->foreign('zamowienie_id')->references('id')->on('zamowienia')->onDelete('cascade');
        $table->foreign('bilet_id')->references('id')->on('bilety')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('szczegoly_zamowienia');
    }
};
