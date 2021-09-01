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
        Permission::create(['name'=>'create'])->assignRole($roleAdmin);
        Permission::create(['name'=>'read'])->assignRole($roleAdmin);
        Permission::create(['name'=>'update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'delete'])->assignRole($roleAdmin);

        /* Routes Permissions */
        Permission::create(['name'=>'admin.menu'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.slider'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.historia'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.obras'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.rehabilitaciones'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.cocinas'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.interiores'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.parquets'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.partners'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.premisos'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.perfil'])->assignRole($roleAdmin);  

        Permission::create(['name'=>'admin.users'])->assignRole($roleAdmin);

    }
}
