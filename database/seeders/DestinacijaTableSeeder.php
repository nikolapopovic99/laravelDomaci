<?php

namespace Database\Seeders;

use App\Models\Destinacija;
use Illuminate\Database\Seeder;

class DestinacijaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destinacija::create([
            'destinacija' => 'Madrid',
            'drzava' => 'Spanija',
            'datum' => '22.12.2022.'
        ]);

        Destinacija::create([
            'destinacija' => 'Moskva',
            'drzava' => 'Rusija',
            'datum' => '25.12.2022.'
        ]);

        Destinacija::create([
            'destinacija' => 'Istanbul',
            'drzava' => 'Turska',
            'datum' => '26.12.2022.'
        ]);

        Destinacija::create([
            'destinacija' => 'New York',
            'drzava' => 'SAD',
            'datum' => '28.12.2022.'
        ]);

        Destinacija::create([
            'destinacija' => 'Tokyo',
            'drzava' => 'Japan',
            'datum' => '30.12.2022.'
        ]);


    }
}
