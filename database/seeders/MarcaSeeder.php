<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Marca;
class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marca::create(['descripcion'=>'Gloria']);
        Marca::create(['descripcion'=>'GN']);
        Marca::create(['descripcion'=>'Don Vitorio']);
        Marca::create(['descripcion'=>'Molitalia']);
        Marca::create(['descripcion'=>'Donofrio']);
        Marca::create(['descripcion'=>'Pepsi']);
        Marca::create(['descripcion'=>'Coca Cola']);
        Marca::create(['descripcion'=>'Inca Kola']);
        Marca::create(['descripcion'=>'Sprite']);
        Marca::create(['descripcion'=>'Fanta']);
    }
}
