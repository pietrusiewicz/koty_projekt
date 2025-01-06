<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorzySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sponsor::create([
            'nazwa' => 'TechCorp',
            'dane_kontaktowe' => 'kontakt@techcorp.com',
            'wniosek' => '5000',
        ]);

        Sponsor::create([
            'nazwa' => 'PetWorld',
            'dane_kontaktowe' => 'kontakt@petworld.com',
            'wniosek' => '3000',
        ]);

        Sponsor::create([
            'nazwa' => 'FelineFriends',
            'dane_kontaktowe' => 'support@felinefriends.com',
            'wniosek' => '4500',
        ]);

        Sponsor::create([
            'nazwa' => 'Paws&Claws',
            'dane_kontaktowe' => 'info@pawsandclaws.com',
            'wniosek' => '5500',
        ]);

        Sponsor::create([
            'nazwa' => 'HealthyPets',
            'dane_kontaktowe' => 'hello@healthypets.com',
            'wniosek' => '4000',
        ]);
    }
}
