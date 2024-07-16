<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $role1=  Role::create(['name'=>'Admin']);
      $role2=  Role::create(['name'=>'Ventas']);
      $role3= Role::create(['name'=>'Compras']);
      $role4= Role::create(['name'=>'Usuario']);
        //Categoria
      Permission::create(['name'=>'categoria.index'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'categoria.create'])->syncRoles([$role1]);
      Permission::create(['name'=>'categoria.destroy'])->syncRoles([$role1]);
      Permission::create(['name'=>'categoria.edit'])->syncRoles([$role1]);
      Permission::create(['name'=>'categoria.pdf'])->syncRoles([$role1]);
        //Producto
      Permission::create(['name'=>'producto.index'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'producto.create'])->syncRoles([$role1]);
      Permission::create(['name'=>'producto.destroy'])->syncRoles([$role1]);
      Permission::create(['name'=>'producto.edit'])->syncRoles([$role1]);
      Permission::create(['name'=>'producto.pdf'])->syncRoles([$role1]);
      //Marca
      Permission::create(['name'=>'marca.index'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'marca.create'])->syncRoles([$role1]);
      Permission::create(['name'=>'marca.destroy'])->syncRoles([$role1]);
      Permission::create(['name'=>'marca.edit'])->syncRoles([$role1]);
      //Orden Compra
      Permission::create(['name'=>'ordencompra.index'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'ordencompra.create'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'ordencompra.destroy'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'ordencompra.edit'])->syncRoles([$role1,$role3]);
        //Orden Venta
      Permission::create(['name'=>'ordenventa.index'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'ordenventa.create'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'ordenventa.destroy'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'ordenventa.edit'])->syncRoles([$role1,$role2]);
        //Proveedor
      Permission::create(['name'=>'proveedor.index'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'proveedor.create'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'proveedor.destroy'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'proveedor.edit'])->syncRoles([$role1,$role3]);
        // Grafico
        Permission::create(['name'=>'rgrafico'])->syncRoles([$role1,$role2,$role3]);
 
    }
}
