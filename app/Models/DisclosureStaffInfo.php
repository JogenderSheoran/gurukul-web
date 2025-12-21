<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DisclosureStaffInfo extends Model
{
    use HasFactory;

    protected $table = 'disclosure_staff_info';

    protected $fillable = [
        'principal_name',
        'total_teachers',
        'pgt_teachers',
        'tgt_teachers',
        'prt_teachers',
        'teacher_student_ratio',
        'special_educator_details',
        'counsellor_and_wellness_teacher_details',
    ];
}
