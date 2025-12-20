<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'lab_name',
        'main_banner',
        'description',
        'slider_images',
        'status'
    ];

    protected $casts = [
        'slider_images' => 'array',
    ];
}
