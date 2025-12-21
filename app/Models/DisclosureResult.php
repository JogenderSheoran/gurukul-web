<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DisclosureResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_type',
        'year',
        'no_of_registered_students',
        'no_of_students_passed',
        'pass_percentage',
        'remarks',
    ];
}
