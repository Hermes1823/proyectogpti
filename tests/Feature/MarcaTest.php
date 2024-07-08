<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarcaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_marca(): void
    {
        $response = $this->get('http://localhost:8000/marca');

        $response->assertStatus(200);
    }
}
