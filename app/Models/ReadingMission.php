<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingMission extends Model
{
    protected $table = 'reading_missions';
    
    protected $fillable = [
        'main_image',
        'description',
    ];
}
