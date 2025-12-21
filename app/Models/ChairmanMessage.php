<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChairmanMessage extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'short_description',
        'full_description',
        'status',
    ];
}
