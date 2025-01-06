<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kot;
use App\Models\Uzytkownik;

class KotySeeder extends Seeder
{
    public function run()
    {
        $colors = ['czarny', 'biały', 'szary', 'rudy', 'łaciaty'];
        $breeds = ['Perski', 'Maine Coon', 'Sfinks', 'Syjamski', 'Brytyjski'];
        $genders = ['f', 'm'];
        $kategorie=["1","2","3","4","5"];

        // Pobieranie właścicieli
        $owners = Uzytkownik::where('rola', 'klient')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Kot::create([
                'nazwa' => 'Kot' . $i,
                'rasa' => $breeds[array_rand($breeds)],
                'wiek' => rand(1, 15),
                'kolor' => $colors[array_rand($colors)],
                'plec' => $genders[array_rand($genders)],
                'wlasciciel_id' => $owners[array_rand($owners)],
                'kategoria_id' => $kategorie[array_rand($kategorie)],
                'opis' => 'Opis kota numer ' . $i,
            ]);
        }
    }
}
