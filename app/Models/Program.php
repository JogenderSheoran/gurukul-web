<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'program_key',
        'title',
        'main_image',
        'description',
        'slider_images',
        'status',
    ];

    protected $casts = [
        'slider_images' => 'array',
    ];

    public static function getProgramNames()
    {
        return [
            'sports' => 'Sports Complex',
            'reading' => 'Reading Mission',
            'celebrations' => 'Celebrations & Adventure Trips',
            'activities' => 'Co-curricular Activities',
            'exams' => 'Competitive Examinations',
            'house_system' => 'House System',
        ];
    }

    public static function getActivePrograms()
    {
        return self::where('status', 'active')->get();
    }
}
