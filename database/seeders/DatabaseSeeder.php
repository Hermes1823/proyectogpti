<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(OrdenVentaSeeder::class);
    }
}
