<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoCurricularActivity extends Model
{
    use HasFactory;

    protected $table = 'co_curricular_activities';
    
    protected $fillable = [
        'description',
        'main_image',
        'gallery_images',
    ];

    protected $casts = [
        'gallery_images' => 'array',
    ];
}
