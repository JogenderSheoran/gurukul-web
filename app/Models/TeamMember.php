<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_type',
        'full_name',
        'designation',
        'teaching_subject',
        'profile_image',
    ];
}
