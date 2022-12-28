<?php

namespace Database\Seeders;

use App\Models\Rezervacija;
use Illuminate\Database\Seeder;

class RezervacijaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {

            Rezervacija::create([
                'ime' => $faker->firstName(),
                'prezime' => $faker->lastName(),
                'brojPasosa' => $faker->numberBetween(10000000, 99999999),
                'destinacijaID' => rand(1,5),
                'tipID' => rand(1,3)
            ]);
        }
    }
}
