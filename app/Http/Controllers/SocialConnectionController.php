<?php

namespace App\Http\Controllers;

use App\Models\SocialPlatformPreference;
use App\Models\SocialPlatformConnection;
use App\Services\Social\LinkedInConnectionService;
use App\Services\Social\MetaConnectionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class SocialConnectionController extends Controller
{
    public function __construct(
        private readonly MetaConnectionService $metaConnectionService,
        private readonly LinkedInConnectionService $linkedInConnectionService,
    ) {
    }

    public function index(): View
    {
        SocialPlatformPreference::syncDefaults();

        $connections = SocialPlatformConnection::query()
            ->latest()
            ->get()
            ->groupBy('platform');

        $preferences = Schema::hasTable('social_platform_preferences')
            ? SocialPlatformPreference::query()->get()->keyBy('platform')
            : collect();

        return view('admin.social-connections.index', [
            'metaConnections' => $connections->get(SocialPlatformConnection::PLATFORM_META, collect()),
            'linkedInConnections' => $connections->get(SocialPlatformConnection::PLATFORM_LINKEDIN, collect()),
            'metaCallbackUrl' => route('admin.social-connections.meta.callback'),
            'linkedInCallbackUrl' => route('admin.social-connections.linkedin.callback'),
            'platformPreparation' => $this->platformPreparation(),
            'platformPreferences' => $preferences,
        ]);
    }

    public function updatePreferences(Request $request): RedirectResponse
    {
        if (!Schema::hasTable('social_platform_preferences')) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'Falta ejecutar la migracion de preferencias sociales antes de guardar esta configuracion.');
        }

        SocialPlatformPreference::syncDefaults();

        $data = $request->validate([
            'enabled_platforms' => ['nullable', 'array'],
            'enabled_platforms.*' => ['required', 'string'],
        ]);

        $selectedPlatforms = collect($data['enabled_platforms'] ?? [])
            ->intersect(array_keys($this->platformCatalog()))
            ->values()
            ->all();

        foreach (array_keys($this->platformCatalog()) as $platform) {
            SocialPlatformPreference::query()->updateOrCreate(
                ['platform' => $platform],
                ['is_enabled' => in_array($platform, $selectedPlatforms, true)]
            );
        }

        return redirect()
            ->route('admin.social-connections.index')
            ->with('success', 'Las redes activas del panel fueron actualizadas.');
    }

    public function redirectMeta(Request $request): RedirectResponse
    {
        $state = Str::random(40);
        $request->session()->put('social_oauth.meta_state', $state);

        try {
            return redirect()->away($this->metaConnectionService->authorizationUrl($state));
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', $exception->getMessage());
        }
    }

    public function handleMetaCallback(Request $request): RedirectResponse
    {
        if ($request->string('state')->toString() !== $request->session()->pull('social_oauth.meta_state')) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'El estado de seguridad de Meta no coincide. Intenta conectar de nuevo.');
        }

        if ($request->filled('error')) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'Meta devolvio un error: ' . ($request->input('error_message') ?: $request->input('error')));
        }

        try {
            $token = $this->metaConnectionService->exchangeCodeForToken((string) $request->string('code'));
            $profile = $this->metaConnectionService->fetchProfile($token['access_token']);
            $pages = $this->metaConnectionService->fetchPages($token['access_token']);
            $selectedPage = $pages[0] ?? null;

            SocialPlatformConnection::updateOrCreate(
                [
                    'platform' => SocialPlatformConnection::PLATFORM_META,
                    'provider_user_id' => (string) $profile['id'],
                ],
                [
                    'account_name' => $profile['name'] ?? 'Cuenta Meta',
                    'account_email' => $profile['email'] ?? null,
                    'status' => 'connected',
                    'access_token' => $token['access_token'],
                    'token_expires_at' => isset($token['expires_in']) ? now()->addSeconds((int) $token['expires_in']) : null,
                    'scopes' => config('services.meta.scopes', []),
                    'meta_page_id' => $selectedPage['id'] ?? null,
                    'meta_page_name' => $selectedPage['name'] ?? null,
                    'meta_page_access_token' => $selectedPage['access_token'] ?? null,
                    'meta_instagram_account_id' => $selectedPage['instagram_business_account']['id'] ?? null,
                    'meta_instagram_username' => $selectedPage['instagram_business_account']['username'] ?? null,
                    'payload' => [
                        'pages' => $pages,
                        'profile' => $profile,
                    ],
                    'connected_by' => $request->user()?->id,
                ]
            );

            return redirect()
                ->route('admin.social-connections.index')
                ->with('success', 'La cuenta de Meta se conecto correctamente.');
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'No fue posible completar la conexion con Meta: ' . $exception->getMessage());
        }
    }

    public function selectMetaPage(Request $request, SocialPlatformConnection $socialPlatformConnection): RedirectResponse
    {
        if ($socialPlatformConnection->platform !== SocialPlatformConnection::PLATFORM_META) {
            abort(404);
        }

        $data = $request->validate([
            'page_id' => ['required', 'string'],
        ]);

        $pages = collect($socialPlatformConnection->payload['pages'] ?? []);
        $selectedPage = $pages->firstWhere('id', $data['page_id']);

        if ($selectedPage === null) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'La pagina seleccionada no existe dentro de la conexion guardada.');
        }

        $socialPlatformConnection->update([
            'meta_page_id' => $selectedPage['id'] ?? null,
            'meta_page_name' => $selectedPage['name'] ?? null,
            'meta_page_access_token' => $selectedPage['access_token'] ?? null,
            'meta_instagram_account_id' => $selectedPage['instagram_business_account']['id'] ?? null,
            'meta_instagram_username' => $selectedPage['instagram_business_account']['username'] ?? null,
        ]);

        return redirect()
            ->route('admin.social-connections.index')
            ->with('success', 'La pagina principal de Meta fue actualizada.');
    }

    public function redirectLinkedIn(Request $request): RedirectResponse
    {
        $state = Str::random(40);
        $request->session()->put('social_oauth.linkedin_state', $state);

        try {
            return redirect()->away($this->linkedInConnectionService->authorizationUrl($state));
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', $exception->getMessage());
        }
    }

    public function handleLinkedInCallback(Request $request): RedirectResponse
    {
        if ($request->string('state')->toString() !== $request->session()->pull('social_oauth.linkedin_state')) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'El estado de seguridad de LinkedIn no coincide. Intenta conectar de nuevo.');
        }

        if ($request->filled('error')) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'LinkedIn devolvio un error: ' . ($request->input('error_description') ?: $request->input('error')));
        }

        try {
            $token = $this->linkedInConnectionService->exchangeCodeForToken((string) $request->string('code'));
            $profile = $this->linkedInConnectionService->fetchUserInfo($token['access_token']);

            SocialPlatformConnection::updateOrCreate(
                [
                    'platform' => SocialPlatformConnection::PLATFORM_LINKEDIN,
                    'provider_user_id' => (string) ($profile['sub'] ?? $profile['id']),
                ],
                [
                    'account_name' => $profile['name'] ?? trim(($profile['given_name'] ?? '') . ' ' . ($profile['family_name'] ?? '')),
                    'account_email' => $profile['email'] ?? null,
                    'status' => 'connected',
                    'access_token' => $token['access_token'],
                    'refresh_token' => $token['refresh_token'] ?? null,
                    'token_expires_at' => isset($token['expires_in']) ? now()->addSeconds((int) $token['expires_in']) : null,
                    'scopes' => config('services.linkedin.scopes', []),
                    'payload' => [
                        'profile' => $profile,
                    ],
                    'connected_by' => $request->user()?->id,
                ]
            );

            return redirect()
                ->route('admin.social-connections.index')
                ->with('success', 'La cuenta de LinkedIn se conecto correctamente.');
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.social-connections.index')
                ->with('error', 'No fue posible completar la conexion con LinkedIn: ' . $exception->getMessage());
        }
    }

    public function destroy(SocialPlatformConnection $socialPlatformConnection): RedirectResponse
    {
        $socialPlatformConnection->delete();

        return redirect()
            ->route('admin.social-connections.index')
            ->with('success', 'La conexion fue eliminada.');
    }

    private function platformPreparation(): array
    {
        return array_values($this->platformCatalog());
    }

    private function platformCatalog(): array
    {
        return [
            'facebook' => [
                'name' => 'Facebook',
                'family' => 'Meta',
                'networks' => ['Facebook'],
                'status' => $this->hasRequiredConfig([
                    'services.meta.app_id',
                    'services.meta.client_secret',
                    'services.meta.redirect',
                ]),
                'description' => 'Usa la conexion Meta y la pagina seleccionada para publicar en Facebook.',
                'redirect' => config('services.meta.redirect'),
                'keys' => ['META_APP_ID', 'META_APP_SECRET', 'META_CONFIG_ID', 'META_REDIRECT_URI'],
            ],
            'instagram' => [
                'name' => 'Instagram',
                'family' => 'Meta',
                'networks' => ['Instagram'],
                'status' => $this->hasRequiredConfig([
                    'services.meta.app_id',
                    'services.meta.client_secret',
                    'services.meta.redirect',
                ]),
                'description' => 'Comparte la misma conexion de Meta, pero necesita Instagram profesional enlazado.',
                'redirect' => config('services.meta.redirect'),
                'keys' => ['META_APP_ID', 'META_APP_SECRET', 'META_CONFIG_ID', 'META_REDIRECT_URI'],
            ],
            'linkedin' => [
                'name' => 'LinkedIn',
                'family' => 'LinkedIn',
                'networks' => ['LinkedIn'],
                'status' => $this->hasRequiredConfig([
                    'services.linkedin.client_id',
                    'services.linkedin.client_secret',
                    'services.linkedin.redirect',
                ]),
                'description' => 'Preparado para conectar cuenta personal y publicar desde el panel.',
                'redirect' => config('services.linkedin.redirect'),
                'keys' => ['LINKEDIN_CLIENT_ID', 'LINKEDIN_CLIENT_SECRET', 'LINKEDIN_REDIRECT_URI'],
            ],
            'tiktok' => [
                'name' => 'TikTok',
                'family' => 'TikTok',
                'networks' => ['TikTok'],
                'status' => $this->hasRequiredConfig([
                    'services.tiktok.client_key',
                    'services.tiktok.client_secret',
                    'services.tiktok.redirect',
                ]),
                'description' => 'Queda preparado para conectar la app cuando ya tengas el dominio final aprobado.',
                'redirect' => config('services.tiktok.redirect'),
                'keys' => ['TIKTOK_CLIENT_KEY', 'TIKTOK_CLIENT_SECRET', 'TIKTOK_REDIRECT_URI'],
            ],
            'x' => [
                'name' => 'X',
                'family' => 'X',
                'networks' => ['X'],
                'status' => $this->hasRequiredConfig([
                    'services.x.client_id',
                    'services.x.client_secret',
                    'services.x.redirect',
                ]),
                'description' => 'Configuracion reservada para futura integracion si luego te interesa.',
                'redirect' => config('services.x.redirect'),
                'keys' => ['X_CLIENT_ID', 'X_CLIENT_SECRET', 'X_REDIRECT_URI'],
            ],
        ];
    }

    private function hasRequiredConfig(array $keys): bool
    {
        foreach ($keys as $key) {
            if (blank(config($key))) {
                return false;
            }
        }

        return true;
    }
}
