<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DisclosureDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'document_title',
        'document_link',
        'document_file',
    ];
}
