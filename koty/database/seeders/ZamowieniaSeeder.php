<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zamowienie;
use App\Models\Uzytkownik;

class ZamowieniaSeeder extends Seeder
{
    public function run()
    {
        //
    }
   /* {
        $statuses = ['oczekujące', 'zrealizowane'];
        $paymentStatuses = ['oczekująca', 'zapłacona'];

        // Pobieranie klientów
        $clients = Uzytkownik::where('rola', 'klient')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Zamowienie::create([
                'klient_id' => $clients[array_rand($clients)],
                'data_zamowienia' => now()->subDays(rand(1, 30)),
                'cena_calkowita' => rand(100, 1000),
                'status' => $statuses[array_rand($statuses)],
                'status_platnosci' => $paymentStatuses[array_rand($paymentStatuses)],
            ]);
        }
    } */
}
