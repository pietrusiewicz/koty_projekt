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
    Schema::create('pracownicy', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('uzytkownik_id');
        $table->string('rola');
        $table->date('data_zatrudnienia');
        $table->timestamps();

        $table->foreign('uzytkownik_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pracownicy');
    }
};
