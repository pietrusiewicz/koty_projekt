<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WystawySeeder extends Seeder
{
    public function run()
    {
        DB::table('wystawy')->insert([
            [
                'nazwa' => 'Międzynarodowa Wystawa Kotów',
                'data_rozpoczecia' => '2024-06-15',
                'data_zakonczenia' => '2024-06-16',
                'miejsce' => 'Warszawa, Hala Expo',
                'opis' => 'Największa wystawa kotów w Polsce.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
