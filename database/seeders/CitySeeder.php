<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name' => 'Recife']);
        City::create(['name' => 'Jaboatão dos Guararapes']);
        City::create(['name' => 'Olinda']);
        City::create(['name' => 'Caruaru']);
        City::create(['name' => 'Petrolina']);
        City::create(['name' => 'Paulista']);
        City::create(['name' => 'Floresta']);
    }
}
