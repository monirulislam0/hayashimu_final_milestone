<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerSlider extends Model
{
    use HasFactory;

    protected $table = 'partner_sliders';
    
    protected $fillable = [
        'title',
        'logo',
        'link',
        'link_label',
        'status',
        'sorting'
    ];

    protected $casts = [
        'status' => 'boolean',
        'sorting' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sorting', 'asc')->orderBy('created_at', 'desc');
    }
}
