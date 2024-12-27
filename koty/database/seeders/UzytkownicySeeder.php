<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UzytkownicySeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'nazwa_uzytkownika' => 'admin',
                'email' => 'admin@example.com',
                'haslo' => Hash::make('admin123'),
                'rola' => 'administrator',
            ],
            [
                'nazwa_uzytkownika' => 'klient1',
                'email' => 'klient1@example.com',
                'haslo' => Hash::make('klient123'),
                'rola' => 'klient',
            ],
        ];

        foreach ($users as $user) {
            DB::table('uzytkownicy')->updateOrInsert(
                ['email' => $user['email']], // Warunek wyszukiwania
                [
                    'nazwa_uzytkownika' => $user['nazwa_uzytkownika'],
                    'haslo' => $user['haslo'],
                    'rola' => $user['rola'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
