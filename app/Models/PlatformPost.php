<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform_config_id',
        'post_type',
        'external_id',
        'title',
        'content',
        'media',
        'metadata',
        'published',
        'published_at',
    ];

    protected $casts = [
        'media' => 'json',
        'metadata' => 'json',
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function platform()
    {
        return $this->belongsTo(PlatformConfig::class, 'platform_config_id');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true)
            ->orderBy('published_at', 'desc');
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('post_type', $type);
    }
}
