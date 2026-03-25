<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class SocialPost extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_SCHEDULED = 'scheduled';
    public const STATUS_READY = 'ready';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_FAILED = 'failed';

    public const PLATFORM_LABELS = [
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'linkedin' => 'LinkedIn',
        'threads' => 'Threads',
        'tiktok' => 'TikTok',
        'x' => 'X',
    ];

    protected $fillable = [
        'title',
        'content',
        'platforms',
        'status',
        'publish_at',
        'ready_at',
        'published_at',
        'approved_at',
        'ai_prompt',
        'notes',
        'last_error',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'platforms' => 'array',
        'publish_at' => 'datetime',
        'ready_at' => 'datetime',
        'published_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    public static function availableStatuses(): array
    {
        return [
            self::STATUS_DRAFT => 'Borrador',
            self::STATUS_APPROVED => 'Aprobada',
            self::STATUS_SCHEDULED => 'Programada',
            self::STATUS_READY => 'Lista para publicar',
            self::STATUS_PUBLISHED => 'Publicada',
            self::STATUS_FAILED => 'Con error',
        ];
    }

    public static function availablePlatforms(): array
    {
        return self::PLATFORM_LABELS;
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(SocialPublishLog::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return static::availableStatuses()[$this->status] ?? ucfirst($this->status);
    }

    public function getPlatformLabelsAttribute(): array
    {
        return collect($this->platforms ?? [])
            ->map(fn (string $platform) => static::PLATFORM_LABELS[$platform] ?? ucfirst($platform))
            ->values()
            ->all();
    }

    public function isDue(Carbon $now): bool
    {
        return $this->status === static::STATUS_SCHEDULED
            && $this->publish_at !== null
            && $this->publish_at->lte($now);
    }
}
