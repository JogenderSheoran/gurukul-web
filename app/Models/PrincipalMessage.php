<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrincipalMessage extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'short_description',
        'full_description',
        'status',
    ];
}
