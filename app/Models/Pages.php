<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mutators\ModuleMutators;

class Pages extends Model
{
    use HasFactory,
    ModuleMutators;

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'imagen_principal',
        'texto_principal',
        'texto_secundario'
    ];

    protected $appends = ['translation'];

    public function getCategory(){
        return $this->belongsTo('App\Models\Menu', 'menu_id');
    }
}
