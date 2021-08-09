<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mutators\menuMutators;

class Menu extends Model
{
    use HasFactory, menuMutators;

    protected $table = 'category_menu'; 

    protected $fillable = ['nombre', 'ruta', 'sort_order'];

    public $timestamps = false;

    public function getModule(){
        return $this->hasOne('App\Models\Module', 'category_menu_id');
    }
}
