<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DisclosureGeneralInfo extends Model
{
    use HasFactory;

    protected $table = 'disclosure_general_info';

    protected $fillable = [
        'school_name',
        'affiliation_no',
        'school_code',
        'complete_address',
        'principal_name',
        'principal_qualification',
        'school_email',
        'contact_details',
    ];
}
