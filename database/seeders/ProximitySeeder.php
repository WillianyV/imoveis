<?php

namespace Database\Seeders;

use App\Models\Proximity;
use Illuminate\Database\Seeder;

class ProximitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proximity::create(['name' => 'Academia']);
        Proximity::create(['name' => 'Banco']);
        Proximity::create(['name' => 'Bombeiro']);
        Proximity::create(['name' => 'Cinema']);
        Proximity::create(['name' => 'Clínica Médica']);
        Proximity::create(['name' => 'Correios']);
        Proximity::create(['name' => 'Escola']);
        Proximity::create(['name' => 'Estacionamento']);
        Proximity::create(['name' => 'Farmácia']);
        Proximity::create(['name' => 'Hospital']);
        Proximity::create(['name' => 'Padaria']);
        Proximity::create(['name' => 'Parque']);
        Proximity::create(['name' => 'Ponto de Ônibus']);
        Proximity::create(['name' => 'Ponto de Táxi']);
        Proximity::create(['name' => 'Posto Combustível']);
        Proximity::create(['name' => 'Posto Policial']);
        Proximity::create(['name' => 'Restaurante']);
        Proximity::create(['name' => 'Shopping']);
        Proximity::create(['name' => 'Supermercado']);
    }
}
