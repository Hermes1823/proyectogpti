<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReporteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_reporte(): void
    {
        $response = $this->get('http://localhost:8000/categorias/pdf');

        $response->assertStatus(200);
    }
}
