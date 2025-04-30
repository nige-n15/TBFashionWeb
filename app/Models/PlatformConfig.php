<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform_name',
        'platform_type',
        'active',
        'credentials',
    ];

    protected $casts = [
        'active' => 'boolean',
        'credentials' => 'json',
    ];

    public function posts()
    {
        return $this->hasMany(PlatformPost::class);
    }

    public function scopeSocial($query)
    {
        return $query->where('platform_type', 'social');
    }

    public function scopeMarketplace($query)
    {
        return $query->where('platform_type', 'marketplace');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
