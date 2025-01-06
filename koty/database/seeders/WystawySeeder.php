<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wystawa;

class WystawySeeder extends Seeder
{
    public function run()
    {
        $locations = ['Warszawa', 'Kraków', 'Gdańsk', 'Wrocław', 'Poznań'];
        
        for ($i = 1; $i <= 20; $i++) {
            Wystawa::create([
                'nazwa' => 'Wystawa Kotów ' . $i,
                'data_rozpoczecia' => now()->addDays(rand(1, 30)),
                'data_zakonczenia' => now()->addDays(rand(31, 60)),
                'miejsce' => $locations[array_rand($locations)],
                'opis' => 'Opis wystawy numer ' . $i,
            ]);
        }
    }
}
