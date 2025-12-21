<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionManagement extends Model
{
    protected $table = 'nutrition_managements';
    
    protected $fillable = [
        'main_image',
        'description',
        'gallery_image',
    ];

    protected $casts = [
        'gallery_image' => 'array',
    ];
}
