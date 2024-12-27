<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotySeeder extends Seeder
{
    public function run()
    {
        DB::table('koty')->insert([
            [
                'nazwa' => 'Mruczek',
                'rasa' => 'Perski',
                'wiek' => 3,
                'kolor' => 'Biały',
                'plec' => 'm',
                'wlasciciel_id' => 2, // ID użytkownika z tabeli uzytkownicy
                'opis' => 'Bardzo spokojny kot, lubi zabawy z dziećmi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Kicia',
                'rasa' => 'Maine Coon',
                'wiek' => 5,
                'kolor' => 'Szary',
                'plec' => 'f',
                'wlasciciel_id' => 2,
                'opis' => 'Energiczna i ciekawska kotka.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
