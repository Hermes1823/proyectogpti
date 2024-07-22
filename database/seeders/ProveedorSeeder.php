<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create(
            ['ruc'=>'123456789011',
            'razon_social'=>'Lecheros S.A.C',
            'encargado'=>'El señor lechero',
            'direccion'=>'Mas alla'
        ]);
        Proveedor::create(
            ['ruc'=>'123456789012',
            'razon_social'=>'Paperos S.A.C',
            'encargado'=>'El señor papero',
            'direccion'=>'Por alla'
        ]);
    }
}
