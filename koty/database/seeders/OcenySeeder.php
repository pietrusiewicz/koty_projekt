<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Uzytkownik;
use App\Models\Kot;
use App\Models\Ocena;
use Faker\Factory as Faker;

class OcenySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $sedziowie = Uzytkownik::where('rola', 'sedzia')->pluck('id')->toArray();
        $koty =  Kot::all()->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Ocena::create([
                'kot_id' => $koty[array_rand($koty)],
                'wystawa_id' => rand(1, 20),
                'sedzia_id' => $sedziowie[array_rand($sedziowie)], // Wszyscy użytkownicy mają to samo hasło
                'ocena' => rand(1, 10),
                'komentarze'=> $faker->sentence(),
                'data_oceny' => now(),
            ]);
        }
    }
}
