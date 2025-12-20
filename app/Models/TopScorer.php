<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopScorer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'class',
        'section',
        'subject',
        'percentage',
        'academic_year',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
