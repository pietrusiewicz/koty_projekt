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
    Schema::create('oceny', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('kot_id');
        $table->unsignedBigInteger('wystawa_id');
        $table->unsignedBigInteger('sedzia_id');
        $table->integer('ocena');
        $table->text('komentarze')->nullable();
        $table->date('data_oceny');
        $table->timestamps();

        $table->foreign('kot_id')->references('id')->on('koty')->onDelete('cascade');
        $table->foreign('wystawa_id')->references('id')->on('wystawy')->onDelete('cascade');
        $table->foreign('sedzia_id')->references('id')->on('uzytkownicy')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oceny');
    }
};
