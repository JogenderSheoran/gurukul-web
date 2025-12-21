<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DisclosureInfrastructure extends Model
{
    use HasFactory;

    protected $table = 'disclosure_infrastructure';

    protected $fillable = [
        'total_campus_area',
        'no_of_classrooms',
        'size_of_classrooms',
        'no_of_laboratories',
        'size_of_laboratories',
        'internet_facility',
        'no_of_girls_toilets',
        'no_of_boys_toilets',
        'school_inspection_video_link',
    ];
}
