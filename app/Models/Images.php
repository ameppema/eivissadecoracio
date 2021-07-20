<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['image_src', 
                            'image_alt',
                            'gallery_id',
                            'gallery_type', 
                            'sort_order'];
}
