<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'summary',
        'description',
        'image_path',
        'project_url',
        'completed_at',
        'display_order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'completed_at' => 'date',
        'is_featured' => 'bool',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $project) {
            if (blank($project->slug) && filled($project->title)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderByDesc('completed_at')->orderByDesc('id');
    }

    public function imageUrl(): string
    {
        return SiteSetting::current()->assetUrl($this->image_path);
    }
}
