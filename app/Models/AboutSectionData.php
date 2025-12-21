<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutSectionData extends Model
{
    use HasFactory;
    
    protected $table = 'about_section_data';
    
    protected $fillable = [
        'principal_message',
        'principal_image',
        'chairman_message',
        'chairman_image',
        'our_vision',
        'our_vision_image',
        'our_mission',
        'our_mission_image',
        'core_value',
        'core_value_image',
    ];
}
