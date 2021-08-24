<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Menu::create(['nombre' => 'obras','ruta'=>'obras','sort_order'=>1,'locale' => 'es']);
        \App\Models\Menu::create(['nombre' => 'interiores','ruta'=>'interiores','sort_order'=>2,'locale' => 'es']);
        \App\Models\Menu::create(['nombre' => 'cocinas','ruta'=>'cocinas','sort_order'=>3,'locale' => 'es']);
        \App\Models\Menu::create(['nombre' => 'rehabilitaciones','ruta'=>'rehabilitaciones','sort_order'=>4,'locale' => 'es']);
        \App\Models\Menu::create(['nombre' => 'parquets','ruta'=>'parquets','sort_order'=>5,'locale' => 'es']);
        \App\Models\Menu::create(['nombre' => 'historia','ruta'=>'historia','sort_order'=>6,'locale' => 'es']);
    }
}
