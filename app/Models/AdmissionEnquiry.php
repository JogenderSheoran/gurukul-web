<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionEnquiry extends Model
{
    protected $fillable = [
        'student_full_name',
        'date_of_birth',
        'age',
        'gender',
        'nationality',
        'last_class_study',
        'last_school_board',
        'admission_for_class',
        'father_full_name',
        'mother_full_name',
        'father_mobile_number',
        'mother_mobile_number',
        'email_address',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
