<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_producto_get(): void
    {
        $response = $this->get('http://localhost:8000/producto');

        $response->assertStatus(200);
    }

    public function test_producto_post(): void
    {


        $producto = new Producto();

        $producto->descripcion = 'producto';
        $producto->imagen = 'asas'; //este es un texarea
        $producto->id_medida = 1;// este es un select 2 y agarra la variable desripcion de medida
        $producto->id_marca = 1;// este es un select 2 y agarra la variable desripcion de marca
        $producto->precio_venta = 50;
        $producto->precio_compra = 60;
        $producto->cantidad = 2;
        $producto->id_categoria = 1;// este es un select 2 y agarra la variable desripcion de categoria

        $response = $this->post('http://localhost:8000/producto',$producto);

        $response->assertStatus(201);
    }
}
