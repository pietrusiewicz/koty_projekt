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
    Schema::create('wystawy', function (Blueprint $table) {
        $table->id();
        $table->string('nazwa');
        $table->date('data_rozpoczecia');
        $table->date('data_zakonczenia');
        $table->string('miejsce');
        $table->text('opis')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wystawy');
    }
};
