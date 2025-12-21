<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthNutrition extends Model
{
    protected $table = 'health_nutritions';
    
    protected $fillable = [
        'main_image',
        'description',
        'gallery_image',
    ];

    protected $casts = [
        'gallery_image' => 'array',
    ];
}
