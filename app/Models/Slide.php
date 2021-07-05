<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $table = 'slide';
    protected $fillable = [

        'titulo',
        'descripcion',
        'imagen',
        'imagen',
        'imagen_movil'

    ];

    public $timestamps = false;
}
