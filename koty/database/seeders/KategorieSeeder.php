<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategorie;
use App\Models\Uzytkownik;

class KategorieSeeder extends Seeder
{
    public function run()
    {
        Kategorie::create([
            'nazwa' => "Kocięta",
            'opis' => "(0-1 rok) Koty w tym wieku są młode, pełne energii i szybko się rozwijają.",
        ]);
        Kategorie::create([
            'nazwa' => "Młode koty",
            'opis' => "(1-3 lata) Koty, które zakończyły okres intensywnego wzrostu, ale nadal są bardzo aktywne i ciekawskie.",
        ]);
        Kategorie::create([
            'nazwa' => "Dorosłe koty",
            'opis' => "(3-7 lat) W pełni rozwinięte koty, które osiągnęły swój szczyt fizyczny.",
        ]);
        Kategorie::create([
            'nazwa' => "Starsze koty",
            'opis' => " (7-10 lat) Koty wkraczające w wiek średni, zaczynają wykazywać mniejszą aktywność.",
        ]);
        Kategorie::create([
            'nazwa' => "Koty seniory",
            'opis' => "(10+ lat) Starsze koty, które wymagają większej uwagi i specjalistycznej opieki.",
        ]);
        }
}
