<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mutators\PartnerMutators;

class Partners extends Model
{
    use HasFactory,
        PartnerMutators;

    public $timestamps = false;

    protected $appends = ['translation'];

}
