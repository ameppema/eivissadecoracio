<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'category_menu'; 

    protected $fillable = ['nombre', 'ruta', 'sort_order'];

    public $timestamps = false;
}
