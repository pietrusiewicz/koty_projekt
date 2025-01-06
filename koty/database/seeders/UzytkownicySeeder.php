<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Uzytkownik;
use Faker\Factory as Faker;


class UzytkownicySeeder extends Seeder
{
    public function run()
    {
        $roles = ['administrator', 'klient', 'pracownik', 'sedzia'];
        for ($i = 1; $i <= 20; $i++) {
            Uzytkownik::create([
                'nazwa_uzytkownika' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'haslo' => 'poziomd', // Wszyscy użytkownicy mają to samo hasło
                'rola' => $roles[array_rand($roles)],
            ]);
        }
    }
}