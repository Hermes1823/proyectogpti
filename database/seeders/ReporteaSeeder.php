<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reportea;

class ReporteaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            array('nombre' => 'aceite','porcentaje'=>61.4),
            array('nombre' => 'arroz','porcentaje'=>61.4),
            array('nombre' => 'leche','porcentaje'=>61.4),
            array('nombre' => 'galletas','porcentaje'=>61.4),
            array('nombre' => 'coca kola','porcentaje'=>61.4),
            array('nombre' => 'inka kola','porcentaje'=>61.4),
            array('nombre' => 'silla rey','porcentaje'=>61.4),
        ];
        Reportea::insert($data);
    }
}
