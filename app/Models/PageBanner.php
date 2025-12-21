<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_key',
        'banner_image',
        'banner_content',
    ];
}
