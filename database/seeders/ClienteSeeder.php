<?php

namespace Database\Seeders;
use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::factory()->count(100)->create();
        // Cliente::create([
        //     'DNI'=>'12345678',
        //     'nombre'=>'Usuario1',
        //     'apellidos'=>'Apellido1',
        //     'numero'=>'12345677',
        //     'estado'=>1
        // ]);
        // Cliente::create([
        //     'DNI'=>'11111111',
        //     'nombre'=>'Usuario2',
        //     'apellidos'=>'Apellido2',
        //     'numero'=>'123456789',
        //     'estado'=>1
        // ]);

    }
}
