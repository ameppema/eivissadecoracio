<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mutators\SlideMutators;

class Slide extends Model
{
    use HasFactory, 
        SlideMutators;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'imagen',
        'imagen_movil'
    ];
    protected $appends = ['translation'];

    public $timestamps = false;
}
