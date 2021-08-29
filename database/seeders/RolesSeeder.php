<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roleAdmin = Role::create(['name'=>'Admin']);
        $roleEditor = Role::create(['name'=>'Editor']);
        $roleGuest = Role::create(['name'=>'Guest']);

        Permission::create(['name'=>'admin.users'])->assignRole($roleAdmin);

    }
}
