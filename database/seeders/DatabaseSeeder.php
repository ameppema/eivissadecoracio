<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenuSeeder::class,
            GalleriesSeeder::class,
            SlideSeeder::class,
            RolesSeeder::class,
        ]);
        \App\Models\User::create(['name'=>'Test User','email'=>'test@test.com','password'=> Hash::make('12345678')])->assignRole('Admin');
        \App\Models\Partners::create(['titulo'=>'Partners','subtitulo'=>'Phasellus consequat sed dui a dapibus.','locale'=>'es']);
    }
}
