<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
	{
		$this->call([
			UzytkownicySeeder::class,
			KategorieSeeder::class,
			KotySeeder::class,
			WystawySeeder::class,
			
			OcenySeeder::class,
			BiletySeeder::class,
			ZamowieniaSeeder::class,
			SzczegolyZamowieniaSeeder::class,
			PracownicySeeder::class,
			LogiSeeder::class,
			MetodyPlatnosciSeeder::class,
			SponsorzySeeder::class,
		]);
	}

}
