<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfrastructureSection extends Model
{
    protected $fillable = [
        'section_key',
        'main_image',
        'description',
        'slider_images',
    ];

    protected $casts = [
        'slider_images' => 'array',
    ];

    public static function getSectionNames()
    {
        return [
            'classroom' => 'Classroom',
            'library' => 'Library',
            'smart_classroom' => 'Smart Classroom',
            'music_and_dance' => 'Music and Dance',
        ];
    }
}
