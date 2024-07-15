<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('admin'),
            'email_verified_at'=>now(),

        ])->assignRole('Admin');

        User::create([
            'name'=>'ventas',
            'email'=>'ventas@gmail.com',
            'password'=> bcrypt('ventas'),
            'email_verified_at'=>now(),

        ])->assignRole('Ventas');


        User::create([
            'name'=>'compras',
            'email'=>'compras@gmail.com',
            'password'=> bcrypt('compras'),
            'email_verified_at'=>now(),

        ])->assignRole('Compras');

        User::create([
            'name'=>'usuario',
            'email'=>'usuario@gmail.com',
            'password'=> bcrypt('usuario'),
            'email_verified_at'=>now(),

        ])->assignRole('Usuario');
      // User::factory(2)->create();
    }
}
