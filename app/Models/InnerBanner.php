<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InnerBanner extends Model
{
    protected $fillable = [
        'image',
        'title',
        'status',
        'order'
    ];
}
