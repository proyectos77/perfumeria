<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialPlatformConnection extends Model
{
    use HasFactory;

    public const PLATFORM_META = 'meta';
    public const PLATFORM_LINKEDIN = 'linkedin';

    protected $fillable = [
        'platform',
        'provider_user_id',
        'account_name',
        'account_email',
        'status',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'scopes',
        'meta_page_id',
        'meta_page_name',
        'meta_page_access_token',
        'meta_instagram_account_id',
        'meta_instagram_username',
        'payload',
        'connected_by',
    ];

    protected $casts = [
        'access_token' => 'encrypted',
        'refresh_token' => 'encrypted',
        'meta_page_access_token' => 'encrypted',
        'payload' => 'encrypted:array',
        'scopes' => 'array',
        'token_expires_at' => 'datetime',
    ];

    public static function platformLabels(): array
    {
        return [
            self::PLATFORM_META => 'Meta',
            self::PLATFORM_LINKEDIN => 'LinkedIn',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'connected_by');
    }

    public function getPlatformLabelAttribute(): string
    {
        return static::platformLabels()[$this->platform] ?? ucfirst($this->platform);
    }
}
