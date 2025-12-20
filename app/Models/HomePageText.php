<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageText extends Model
{
    protected $fillable = [
        'heading_en',
        'heading_hi',
        'text_en',
        'text_hi',
        'status'
    ];
}
