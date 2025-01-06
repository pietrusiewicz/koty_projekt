<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MetodyPlatnosci;

class MetodyPlatnosciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodyPlatnosci::create([
            'nazwa'=>'PayPal',
            'opis'=>'PayPal to popularna platforma płatności online, umożliwiająca szybkie i bezpieczne płatności za pomocą konta PayPal, karty kredytowej lub przelewu. Idealna do międzynarodowych transakcji.'
        ]);

        MetodyPlatnosci::create([
            'nazwa'=>'Przelew tradycyjny',
            'opis'=>'Tradycyjny przelew bankowy, polegający na przelaniu środków z konta na konto. Realizacja może potrwać kilka godzin lub dni roboczych, zależnie od banku.'
        ]);

        MetodyPlatnosci::create([
            'nazwa'=>'BLIK',
            'opis'=> 'BLIK to szybka płatność mobilna, polegająca na generowaniu jednorazowego kodu w aplikacji bankowej. Umożliwia płatności online i w sklepach stacjonarnych.'
        ]);
    }
}
