<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class SocialPlatformPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'is_enabled',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    public static function enabledPlatformOptions(): array
    {
        if (!Schema::hasTable('social_platform_preferences')) {
            return [];
        }

        $enabledPlatforms = static::query()
            ->where('is_enabled', true)
            ->pluck('platform')
            ->all();

        if ($enabledPlatforms === []) {
            return [];
        }

        return collect(SocialPost::availablePlatforms())
            ->only($enabledPlatforms)
            ->all();
    }

    public static function syncDefaults(): void
    {
        if (!Schema::hasTable('social_platform_preferences')) {
            return;
        }

        foreach (array_keys(SocialPost::availablePlatforms()) as $platform) {
            static::query()->firstOrCreate(
                ['platform' => $platform],
                ['is_enabled' => in_array($platform, ['facebook', 'instagram', 'linkedin'], true)]
            );
        }
    }
}
