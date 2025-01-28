<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
        'descripcion'=>'zapallo',
        'imagen'=>'productos/zapallo.jpg',
        'id_medida'=>1,
        'id_marca'=>1,
        'id_categoria'=>1,
        'precio_venta'=>5,
        'precio_compra'=>4,
        'cantidad'=>20
      ]);

      Producto::create([
    'descripcion'=>'leche',
      'imagen'=>'productos/leche.jpg',
      'id_medida'=>1,
      'id_marca'=>1,
      'id_categoria'=>2,
      'precio_venta'=>3,
      'precio_compra'=>2,
      'cantidad'=>10
    ]);

    Producto::create([
    'descripcion'=>'Platanos',
    'imagen'=>'productos/platanos.jpg',
    'id_medida'=>1,
    'id_marca'=>1,
    'id_categoria'=>4,
    'precio_venta'=>2,
    'precio_compra'=>1,
    'cantidad'=>11
  ]);
  Producto::create([
    'descripcion'=>'Mandarinas',
  'imagen'=>'productos/mandarinas.webp',
  'id_medida'=>1,
  'id_marca'=>1,
  'id_categoria'=>4,
  'precio_venta'=>2,
  'precio_compra'=>1.5,
  'cantidad'=>50
]);

Producto::create([
  'descripcion'=>'Papa huevo de indio',
'imagen'=>'productos/papas.jpg',
'id_medida'=>1,
'id_marca'=>1,
'id_categoria'=>1,
'precio_venta'=>2,
'precio_compra'=>1.5,
'cantidad'=>100
]);
    }
}
