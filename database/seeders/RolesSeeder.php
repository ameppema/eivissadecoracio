<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        /* Roles */
        $roleAdmin = Role::create(['name'=>'Admin']);
        $roleEditor = Role::create(['name'=>'Editor']);
        $roleGuest = Role::create(['name'=>'Guest']);
        $roleEspecial = Role::create(['name'=>'Especial']);

        /* Actions Permissions */
        Permission::create(['name'=>'create']);
        Permission::create(['name'=>'read']);
        Permission::create(['name'=>'update']);
        Permission::create(['name'=>'delete']);

        /* Route Permissions */
        Permission::create(['name'=>'admin.menu']);
        Permission::create(['name'=>'admin.slider']);
        Permission::create(['name'=>'admin.historia']);
        Permission::create(['name'=>'admin.obras']);
        Permission::create(['name'=>'admin.rehabilitaciones']);
        Permission::create(['name'=>'admin.cocinas']);
        Permission::create(['name'=>'admin.parquets']);
        Permission::create(['name'=>'admin.partners']);
        Permission::create(['name'=>'admin.usuarios']);
        Permission::create(['name'=>'admin.premisos']);
        Permission::create(['name'=>'admin.perfil']);

        Permission::create(['name'=>'admin.users'])->assignRole($roleAdmin);

    }
}
