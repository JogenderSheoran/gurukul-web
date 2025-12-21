<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HouseSystem extends Model
{
    use HasFactory;

    protected $table = 'house_systems';
    
    protected $fillable = [
        'description',
        'main_image',
        'gallery_images',
    ];

    protected $casts = [
        'gallery_images' => 'array',
    ];
}
