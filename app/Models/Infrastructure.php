<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    protected $fillable = [
        'icon',
        'heading',
        'description',
        'status',
        'order'
    ];
}
