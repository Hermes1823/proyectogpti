<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(["descripcion"=>"SIN CATEGORIA"]);
        Categoria::create(['descripcion'=>'Verduras']);
        Categoria::create(['descripcion'=>'Lacteos']);
        Categoria::create(['descripcion'=>'Tuberculos']);
        Categoria::create(['descripcion'=>'Frutas']);
        Categoria::create(['descripcion'=>'Cereales']);
        Categoria::create(['descripcion'=>'Aceites']);
        Categoria::create(['descripcion'=>'Producto de Limpieza']);
        Categoria::create(['descripcion'=>'Alimentos enlatados']);
        Categoria::create(['descripcion'=>'Panaderia']);
        Categoria::create(['descripcion'=>'Cremas y quesos']);
    }
}
