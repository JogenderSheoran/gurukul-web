<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdventureCelebration extends Model
{
    protected $fillable = [
        'section_type',
        'card_image',
        'title',
        'gallery_link',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope for active records
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope for adventure type
    public function scopeAdventure($query)
    {
        return $query->where('section_type', 'adventure');
    }

    // Scope for celebration type
    public function scopeCelebration($query)
    {
        return $query->where('section_type', 'celebration');
    }
}
