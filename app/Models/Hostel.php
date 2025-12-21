<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $fillable = [
        'banner_image',
        'additional_image',
        'description',
        'gallery_image',
    ];

    protected $casts = [
        'gallery_image' => 'array',
    ];
}
