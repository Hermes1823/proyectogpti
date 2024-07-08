<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_dashboard(): void
    {
        $response = $this->get('http://localhost:8000/dashboard');

        $response->assertStatus(200);
    }
}
