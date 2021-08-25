<?php

namespace Database\Seeders;

use App\Models\Galleries;
use Illuminate\Database\Seeder;

class GalleriesSeeder extends Seeder
{
    public function run()
    {
        Galleries::create(['module_id'=>'1','belongs_to'=>'']);
        Galleries::create(['module_id'=>'2','belongs_to'=>'']);
        Galleries::create(['module_id'=>'3','belongs_to'=>'']);
        Galleries::create(['module_id'=>'4','belongs_to'=>'']);
        Galleries::create(['module_id'=>'5','belongs_to'=>'']);
        Galleries::create(['module_id'=>'6','belongs_to'=>'']);
        Galleries::create(['module_id'=>'0','belongs_to'=>'partner']);
    }
}
