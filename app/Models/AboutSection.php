<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'heading_en',
        'heading_hi',
        'subheading_en',
        'subheading_hi',
        'description_en',
        'description_hi',
        'content_left_en',
        'content_left_hi',
        'content_right_en',
        'content_right_hi',
        'status'
    ];
}
