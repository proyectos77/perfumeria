<?php

namespace App\Http\Controllers;

use App\Models\SocialPlatformConnection;
use App\Models\SocialPost;
use App\Models\SocialPlatformPreference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use RuntimeException;

class SocialPostController extends Controller
{
    public function index(): View
    {
        SocialPlatformPreference::syncDefaults();

        $platformOptions = SocialPlatformPreference::enabledPlatformOptions();
        if ($platformOptions === []) {
            $platformOptions = SocialPost::availablePlatforms();
        }

        $posts = SocialPost::query()
            ->latest('publish_at')
            ->latest()
            ->paginate(12);

        $linkedInConnection = SocialPlatformConnection::query()
            ->where('platform', SocialPlatformConnection::PLATFORM_LINKEDIN)
            ->where('status', 'connected')
            ->latest()
            ->first();

        $stats = [
            'total' => SocialPost::count(),
            'draft' => SocialPost::where('status', SocialPost::STATUS_DRAFT)->count(),
            'scheduled' => SocialPost::where('status', SocialPost::STATUS_SCHEDULED)->count(),
            'ready' => SocialPost::where('status', SocialPost::STATUS_READY)->count(),
            'published' => SocialPost::where('status', SocialPost::STATUS_PUBLISHED)->count(),
        ];

        return view('admin.social-posts.index', [
            'posts' => $posts,
            'stats' => $stats,
            'linkedInConnection' => $linkedInConnection,
            'platformOptions' => $platformOptions,
            'statusOptions' => [
                SocialPost::STATUS_DRAFT => SocialPost::availableStatuses()[SocialPost::STATUS_DRAFT],
                SocialPost::STATUS_APPROVED => SocialPost::availableStatuses()[SocialPost::STATUS_APPROVED],
            ],
        ]);
    }

    public function create(): View
    {
        SocialPlatformPreference::syncDefaults();

        $platformOptions = SocialPlatformPreference::enabledPlatformOptions();
        if ($platformOptions === []) {
            $platformOptions = SocialPost::availablePlatforms();
        }

        return view('admin.social-posts.create', [
            'post' => new SocialPost([
                'platforms' => array_keys(array_slice($platformOptions, 0, 3, true)),
                'status' => SocialPost::STATUS_DRAFT,
            ]),
            'platformOptions' => $platformOptions,
            'statusOptions' => [
                SocialPost::STATUS_DRAFT => 'Guardar como borrador',
                SocialPost::STATUS_APPROVED => 'Dejar aprobada',
            ],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $state = $this->resolveState($data);

        $post = SocialPost::create([
            ...$data,
            ...$state,
            'created_by' => $request->user()?->id,
            'updated_by' => $request->user()?->id,
        ]);

        $post->logs()->create([
            'status' => 'created',
            'message' => 'La publicacion fue registrada en el panel social.',
            'payload' => [
                'status' => $post->status,
                'platforms' => $post->platforms,
            ],
        ]);

        return redirect()
            ->route('admin.social-posts.index')
            ->with('success', 'La publicacion social fue creada correctamente.');
    }

    public function edit(SocialPost $socialPost): View
    {
        SocialPlatformPreference::syncDefaults();

        $platformOptions = SocialPlatformPreference::enabledPlatformOptions();
        if ($platformOptions === []) {
            $platformOptions = SocialPost::availablePlatforms();
        }

        $socialPost->load(['logs' => fn ($query) => $query->latest()->take(8)]);

        return view('admin.social-posts.edit', [
            'post' => $socialPost,
            'platformOptions' => $platformOptions,
            'statusOptions' => [
                SocialPost::STATUS_DRAFT => 'Guardar como borrador',
                SocialPost::STATUS_APPROVED => 'Dejar aprobada',
            ],
        ]);
    }

    public function update(Request $request, SocialPost $socialPost): RedirectResponse
    {
        $data = $this->validatedData($request);
        $state = $this->resolveState($data, $socialPost);

        $socialPost->update([
            ...$data,
            ...$state,
            'updated_by' => $request->user()?->id,
        ]);

        $socialPost->logs()->create([
            'status' => 'updated',
            'message' => 'La publicacion fue actualizada desde el panel social.',
            'payload' => [
                'status' => $socialPost->status,
                'platforms' => $socialPost->platforms,
            ],
        ]);

        return redirect()
            ->route('admin.social-posts.index')
            ->with('success', 'La publicacion social fue actualizada correctamente.');
    }

    public function generate(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'title' => ['nullable', 'string', 'max:160'],
                'content' => ['nullable', 'string', 'max:5000'],
                'platforms' => ['nullable', 'array'],
                'platforms.*' => ['required', 'string', 'in:' . implode(',', array_keys(SocialPost::availablePlatforms()))],
                'ai_prompt' => ['nullable', 'string', 'max:4000'],
            ]);

            $apiKey = (string) config('services.gemini.api_key');
            $model = (string) config('services.gemini.model', 'gemini-2.0-flash');

            if ($apiKey === '') {
                return response()->json([
                    'message' => 'Falta configurar GOOGLE_GEMINI_API_KEY en el archivo .env.',
                ], 422);
            }

            $prompt = $this->buildAiPrompt($data);

            $response = Http::timeout(60)
                ->acceptJson()
                ->post(sprintf(
                    'https://generativelanguage.googleapis.com/v1beta/models/%s:generateContent?key=%s',
                    $model,
                    $apiKey
                ), [
                    'system_instruction' => [
                        'parts' => [[
                            'text' => 'Eres un estratega senior de contenido para redes sociales. Escribes en espanol profesional, comercial y claro. Entregas respuesta estrictamente en JSON.',
                        ]],
                    ],
                    'contents' => [[
                        'parts' => [[
                            'text' => $prompt,
                        ]],
                    ]],
                    'generationConfig' => [
                        'response_mime_type' => 'application/json',
                        'response_schema' => [
                            'type' => 'OBJECT',
                            'properties' => [
                                'title' => ['type' => 'STRING'],
                                'content' => ['type' => 'STRING'],
                                'notes' => ['type' => 'STRING'],
                            ],
                            'required' => ['title', 'content', 'notes'],
                        ],
                    ],
                ]);

            $response->throw();

            $text = Arr::get($response->json(), 'candidates.0.content.parts.0.text');

            if (!is_string($text) || trim($text) === '') {
                throw new RuntimeException('La IA no devolvio contenido util para esta solicitud.');
            }

            $decoded = json_decode($text, true);

            if (!is_array($decoded)) {
                throw new RuntimeException('La respuesta de la IA no llego en el formato esperado.');
            }

            return response()->json([
                'title' => trim((string) ($decoded['title'] ?? '')),
                'content' => trim((string) ($decoded['content'] ?? '')),
                'notes' => trim((string) ($decoded['notes'] ?? '')),
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }
    }

    public function destroy(SocialPost $socialPost): RedirectResponse
    {
        $socialPost->delete();

        return redirect()
            ->route('admin.social-posts.index')
            ->with('success', 'La publicacion social fue eliminada.');
    }

    public function markPublished(Request $request, SocialPost $socialPost): RedirectResponse
    {
        $socialPost->update([
            'status' => SocialPost::STATUS_PUBLISHED,
            'published_at' => now(),
            'updated_by' => $request->user()?->id,
            'last_error' => null,
        ]);

        $socialPost->logs()->create([
            'status' => 'published',
            'message' => 'La publicacion fue marcada como publicada manualmente.',
        ]);

        return redirect()
            ->route('admin.social-posts.index')
            ->with('success', 'La publicacion quedo marcada como publicada.');
    }

    public function publishToLinkedIn(Request $request, SocialPost $socialPost): RedirectResponse
    {
        if (!in_array(SocialPlatformConnection::PLATFORM_LINKEDIN, $socialPost->platforms ?? [], true)) {
            return redirect()
                ->route('admin.social-posts.index')
                ->with('error', 'Esta publicacion no tiene LinkedIn dentro de sus redes objetivo.');
        }

        $connection = SocialPlatformConnection::query()
            ->where('platform', SocialPlatformConnection::PLATFORM_LINKEDIN)
            ->where('status', 'connected')
            ->latest()
            ->first();

        if ($connection === null) {
            return redirect()
                ->route('admin.social-posts.index')
                ->with('error', 'Primero conecta una cuenta de LinkedIn desde el modulo de conexiones.');
        }

        try {
            $authorUrn = 'urn:li:person:' . $connection->provider_user_id;

            $response = Http::timeout(45)
                ->withToken((string) $connection->access_token)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Linkedin-Version' => (string) config('services.linkedin.version', '202511'),
                    'X-Restli-Protocol-Version' => '2.0.0',
                ])
                ->post('https://api.linkedin.com/rest/posts', [
                    'author' => $authorUrn,
                    'commentary' => trim((string) $socialPost->content),
                    'visibility' => 'PUBLIC',
                    'distribution' => [
                        'feedDistribution' => 'MAIN_FEED',
                        'targetEntities' => [],
                        'thirdPartyDistributionChannels' => [],
                    ],
                    'lifecycleState' => 'PUBLISHED',
                    'isReshareDisabledByAuthor' => false,
                ]);

            if ($response->failed()) {
                $message = $response->json('message')
                    ?? $response->json('error.message')
                    ?? $response->body()
                    ?? 'LinkedIn rechazo la solicitud de publicacion.';

                throw new RuntimeException($message);
            }

            $socialPost->update([
                'status' => SocialPost::STATUS_PUBLISHED,
                'published_at' => now(),
                'ready_at' => $socialPost->ready_at ?? now(),
                'last_error' => null,
                'updated_by' => $request->user()?->id,
            ]);

            $socialPost->logs()->create([
                'platform' => SocialPlatformConnection::PLATFORM_LINKEDIN,
                'status' => 'published',
                'message' => 'La publicacion fue enviada correctamente a LinkedIn.',
                'payload' => [
                    'author' => $authorUrn,
                    'linkedin_post_id' => $response->header('x-restli-id'),
                    'response' => $response->json(),
                ],
            ]);

            return redirect()
                ->route('admin.social-posts.index')
                ->with('success', 'La publicacion fue enviada a LinkedIn correctamente.');
        } catch (\Throwable $exception) {
            $socialPost->update([
                'status' => SocialPost::STATUS_FAILED,
                'last_error' => $exception->getMessage(),
                'updated_by' => $request->user()?->id,
            ]);

            $socialPost->logs()->create([
                'platform' => SocialPlatformConnection::PLATFORM_LINKEDIN,
                'status' => 'failed',
                'message' => 'Fallo el envio real a LinkedIn.',
                'payload' => [
                    'error' => $exception->getMessage(),
                ],
            ]);

            return redirect()
                ->route('admin.social-posts.index')
                ->with('error', 'No fue posible publicar en LinkedIn: ' . $exception->getMessage());
        }
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'content' => ['required', 'string', 'max:5000'],
            'platforms' => ['required', 'array', 'min:1'],
            'platforms.*' => ['required', 'string', 'in:' . implode(',', array_keys(SocialPost::availablePlatforms()))],
            'status' => ['required', 'string', 'in:' . implode(',', [SocialPost::STATUS_DRAFT, SocialPost::STATUS_APPROVED])],
            'publish_at' => ['nullable', 'date'],
            'ai_prompt' => ['nullable', 'string', 'max:4000'],
            'notes' => ['nullable', 'string', 'max:3000'],
        ]);
    }

    private function resolveState(array $data, ?SocialPost $existing = null): array
    {
        $publishAt = !empty($data['publish_at']) ? Carbon::parse($data['publish_at']) : null;
        $requestedStatus = $data['status'];

        $resolvedStatus = $requestedStatus;
        $approvedAt = $existing?->approved_at;
        $readyAt = $existing?->ready_at;
        $publishedAt = $existing?->published_at;
        $lastError = $existing?->last_error;

        if ($requestedStatus === SocialPost::STATUS_APPROVED) {
            $approvedAt = $existing?->approved_at ?? now();

            if ($publishAt !== null && $publishAt->isFuture()) {
                $resolvedStatus = SocialPost::STATUS_SCHEDULED;
                $readyAt = null;
                $publishedAt = null;
            } elseif ($publishAt !== null && $publishAt->lte(now())) {
                $resolvedStatus = SocialPost::STATUS_READY;
                $readyAt = now();
                $publishedAt = null;
            } else {
                $resolvedStatus = SocialPost::STATUS_APPROVED;
                $readyAt = null;
                $publishedAt = null;
            }
        }

        if ($requestedStatus === SocialPost::STATUS_DRAFT) {
            $approvedAt = null;
            $readyAt = null;
            $publishedAt = null;
            $lastError = null;
        }

        return [
            'status' => $resolvedStatus,
            'publish_at' => $publishAt,
            'approved_at' => $approvedAt,
            'ready_at' => $readyAt,
            'published_at' => $publishedAt,
            'last_error' => $lastError,
        ];
    }

    private function buildAiPrompt(array $payload): string
    {
        $platforms = collect($payload['platforms'] ?? [])
            ->map(fn (string $platform) => SocialPost::availablePlatforms()[$platform] ?? ucfirst($platform))
            ->implode(', ');

        return trim(
            "Genera una publicacion profesional para redes sociales en espanol.\n\n" .
            "Titulo interno: " . ($payload['title'] ?? 'Sin titulo') . "\n" .
            "Redes objetivo: " . ($platforms !== '' ? $platforms : 'No definidas') . "\n" .
            "Contenido base del usuario: " . ($payload['content'] ?? 'Sin contenido base') . "\n" .
            "Brief de IA: " . ($payload['ai_prompt'] ?? 'Sin brief adicional') . "\n\n" .
            "Responde con un JSON con estas reglas:\n" .
            "1. title: un titulo interno mejorado, corto y profesional.\n" .
            "2. content: una sola publicacion final bien redactada, persuasiva, clara y lista para usar.\n" .
            "3. notes: recomendaciones breves de enfoque por red y CTA sugerido.\n" .
            "No uses markdown. No expliques fuera del JSON."
        );
    }
}
