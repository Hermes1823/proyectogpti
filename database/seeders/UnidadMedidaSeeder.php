<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UnidadMedida;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnidadMedida::create(['descripcion'=>'KG']);
        UnidadMedida::create(['descripcion'=>'Sacos']);
        UnidadMedida::create(['descripcion'=>'Gr']);
        UnidadMedida::create(['descripcion'=>'L']);
        UnidadMedida::create(['descripcion'=>'g']);
        UnidadMedida::create(['descripcion'=>'paquetes']);
        UnidadMedida::create(['descripcion'=>'cajas']);
        UnidadMedida::create(['descripcion'=>'unidad']);
    }
}
