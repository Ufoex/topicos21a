<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleProveedor = Role::create(['name' => 'Proveedor']);

        Permission::create(['name'=>'home']);

        Permission::create(['name'=>'usuario.index']);
        Permission::create(['name'=>'usuario.create']);
        Permission::create(['name'=>'usuario.delete']);
        Permission::create(['name'=>'usuario.edit']);
        Permission::create(['name'=>'usuario.show']);

        Permission::create(['name'=>'proveedor.index']);
        Permission::create(['name'=>'proveedor.create']);
        Permission::create(['name'=>'proveedor.delete']);
        Permission::create(['name'=>'proveedor.edit']);
        Permission::create(['name'=>'proveedor.show']);

        Permission::create(['name'=>'productos.index']);
        Permission::create(['name'=>'productos.create']);
        Permission::create(['name'=>'productos.delete']);
        Permission::create(['name'=>'productos.edit']);
        Permission::create(['name'=>'productos.show']);

    }
}
