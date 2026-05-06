<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_tagline',
        'site_summary',
        'logo_path',
        'contact_phone',
        'contact_email',
        'whatsapp_number',
        'instagram_url',
        'facebook_url',
        'tiktok_url',
    ];

    protected static ?self $currentInstance = null;

    public static function current(): self
    {
        if (static::$currentInstance instanceof self) {
            return static::$currentInstance;
        }

        if (!Schema::hasTable('site_settings')) {
            return static::$currentInstance = new self(static::defaults());
        }

        return static::$currentInstance = static::query()->first() ?: new self(static::defaults());
    }

    public static function forgetCurrent(): void
    {
        static::$currentInstance = null;
    }

    public static function defaults(): array
    {
        return [
            'site_name' => 'PERFUMERY J & P',
            'site_tagline' => 'Fragancias seleccionadas',
            'site_summary' => 'Tienda online de perfumes con catalogo, pedidos y control de stock.',
            'logo_path' => 'images/logo-pagina.png',
            'contact_phone' => '+57 300 000 0000',
            'contact_email' => 'ventas@perfumerjyp.test',
            'whatsapp_number' => '573000000000',
        ];
    }

    public function assetUrl(?string $path): string
    {
        if (blank($path)) {
            return '';
        }

        $normalizedPath = ltrim((string) $path, '/');

        if (Str::startsWith($normalizedPath, ['http://', 'https://', '//'])) {
            return $normalizedPath;
        }

        if (Str::startsWith($normalizedPath, ['images/', 'favicon', 'css/'])) {
            return asset($normalizedPath);
        }

        if (Str::startsWith($normalizedPath, 'storage/')) {
            return asset($normalizedPath);
        }

        return Storage::disk('public')->url($normalizedPath);
    }

    public function telUrl(): string
    {
        return 'tel:' . preg_replace('/[^0-9+]/', '', (string) $this->contact_phone);
    }

    public function whatsappUrl(): string
    {
        return 'https://wa.me/' . preg_replace('/\D+/', '', (string) $this->whatsapp_number);
    }

    public function socialLinks(): array
    {
        return array_filter([
            ['icon' => 'bi bi-instagram', 'label' => 'Instagram', 'url' => $this->instagram_url],
            ['icon' => 'bi bi-facebook', 'label' => 'Facebook', 'url' => $this->facebook_url],
            ['icon' => 'bi bi-tiktok', 'label' => 'TikTok', 'url' => $this->tiktok_url],
        ], fn (array $item) => filled($item['url']));
    }
}
