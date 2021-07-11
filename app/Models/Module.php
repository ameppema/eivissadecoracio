<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'titulo',
        'subtitulo',
        'imagen_principal',
        'texto_principal',
        'texto_secundario'

    ];

    public function getCategory(){

        return $this->belongsTo('App\Models\Menu', 'category_menu_id');
    
    }
}
