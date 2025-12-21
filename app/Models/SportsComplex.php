<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportsComplex extends Model
{
    protected $table = 'sports_complexes';
    
    protected $fillable = [
        'main_image',
        'description',
        'gallery_image',
    ];

    protected $casts = [
        'gallery_image' => 'array',
    ];
}
