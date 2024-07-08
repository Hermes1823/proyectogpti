<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_categoria(): void
    {
        $response = $this->get('http://localhost:8000/categoria');

        $response->assertStatus(200);
    }
}
