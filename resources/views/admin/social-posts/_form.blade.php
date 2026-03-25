@php
    $selectedPlatforms = old('platforms', $post->platforms ?? []);
    $selectedStatus = old('status', $post->status === \App\Models\SocialPost::STATUS_DRAFT ? \App\Models\SocialPost::STATUS_DRAFT : \App\Models\SocialPost::STATUS_APPROVED);
    $publishAtValue = old('publish_at', optional($post->publish_at)->format('Y-m-d\TH:i'));
@endphp

<div class="social-form-grid">
    <div class="social-form-panel">
        <div class="social-form-panel__section">
            <label for="title" class="form-label fw-semibold">Titulo interno</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-control social-form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $post->title) }}"
                maxlength="160"
                placeholder="Ej: Lanzamiento de pagina corporativa para empresas"
                required
            >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="social-form-panel__section">
            <label for="content" class="form-label fw-semibold">Contenido base</label>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <button
                    type="button"
                    class="btn btn-outline-info rounded-pill px-3 fw-semibold social-ai-generate"
                    data-generate-url="{{ route('admin.social-posts.generate') }}"
                >
                    <i class="bi bi-stars me-2"></i>Generar publicacion con IA
                </button>
                <span class="social-ai-status" data-ai-status></span>
            </div>
            <textarea
                id="content"
                name="content"
                rows="8"
                class="form-control social-form-control @error('content') is-invalid @enderror"
                placeholder="Escribe aqui el contenido base que luego podras adaptar por red."
                required
            >{{ old('content', $post->content) }}</textarea>
            <div class="form-text text-light-emphasis">Esta primera fase guarda el contenido base y la programacion interna. La publicacion externa se conectara despues.</div>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="social-form-panel__section">
            <label for="ai_prompt" class="form-label fw-semibold">Brief o instruccion para IA</label>
            <textarea
                id="ai_prompt"
                name="ai_prompt"
                rows="4"
                class="form-control social-form-control @error('ai_prompt') is-invalid @enderror"
                placeholder="Ej: Generar version corporativa para LinkedIn y version corta para Instagram."
            >{{ old('ai_prompt', $post->ai_prompt) }}</textarea>
            @error('ai_prompt')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="social-form-panel__section">
            <label for="notes" class="form-label fw-semibold">Notas internas</label>
            <textarea
                id="notes"
                name="notes"
                rows="4"
                class="form-control social-form-control @error('notes') is-invalid @enderror"
                placeholder="Notas de aprobacion, enfoque comercial o piezas pendientes."
            >{{ old('notes', $post->notes) }}</textarea>
            @error('notes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="social-form-panel social-form-panel--side">
        <div class="social-form-panel__section">
            <label class="form-label fw-semibold d-block">Redes objetivo</label>
            <div class="social-platform-grid">
                @foreach($platformOptions as $platformKey => $platformLabel)
                    <label class="social-platform-option">
                        <input
                            type="checkbox"
                            name="platforms[]"
                            value="{{ $platformKey }}"
                            {{ in_array($platformKey, $selectedPlatforms, true) ? 'checked' : '' }}
                        >
                        <span>{{ $platformLabel }}</span>
                    </label>
                @endforeach
            </div>
            @error('platforms')
                <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
            @error('platforms.*')
                <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="social-form-panel__section">
            <label for="status" class="form-label fw-semibold">Estado base</label>
            <select id="status" name="status" class="form-select social-form-control @error('status') is-invalid @enderror">
                @foreach($statusOptions as $statusKey => $statusLabel)
                    <option value="{{ $statusKey }}" {{ $selectedStatus === $statusKey ? 'selected' : '' }}>
                        {{ $statusLabel }}
                    </option>
                @endforeach
            </select>
            <div class="form-text text-light-emphasis">
                Si apruebas y defines una fecha futura, el sistema la dejara programada automaticamente.
            </div>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="social-form-panel__section">
            <label for="publish_at" class="form-label fw-semibold">Fecha programada</label>
            <input
                type="datetime-local"
                id="publish_at"
                name="publish_at"
                class="form-control social-form-control @error('publish_at') is-invalid @enderror"
                value="{{ $publishAtValue }}"
            >
            <div class="form-text text-light-emphasis">
                Si la fecha ya paso y el contenido esta aprobado, el sistema lo marcara como listo para publicar.
            </div>
            @error('publish_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="social-form-panel__section social-form-panel__summary">
            <h3>Como queda conectado</h3>
            <p>Esta fase deja listo el panel interno, los estados y la programacion base.</p>
            <ul>
                <li>Laravel guarda el contenido y sus redes objetivo.</li>
                <li>El scheduler detecta cuando la fecha programada ya vencio.</li>
                <li>La publicacion pasa a estado listo para integracion externa.</li>
            </ul>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap gap-3 mt-4">
    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
        <i class="bi bi-save me-2"></i>{{ $submitLabel }}
    </button>
    <a href="{{ route('admin.social-posts.index') }}" class="btn btn-outline-light rounded-pill px-4 fw-semibold">
        Cancelar
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const button = document.querySelector('.social-ai-generate');

        if (!button) {
            return;
        }

        const statusNode = document.querySelector('[data-ai-status]');
        const titleNode = document.getElementById('title');
        const contentNode = document.getElementById('content');
        const promptNode = document.getElementById('ai_prompt');
        const notesNode = document.getElementById('notes');

        button.addEventListener('click', async function () {
            const selectedPlatforms = Array.from(document.querySelectorAll('input[name="platforms[]"]:checked'))
                .map((input) => input.value);

            if (!titleNode?.value.trim() && !contentNode?.value.trim() && !promptNode?.value.trim()) {
                if (statusNode) {
                    statusNode.textContent = 'Escribe al menos un titulo, contenido base o brief para generar.';
                    statusNode.className = 'social-ai-status social-ai-status--error';
                }
                return;
            }

            button.disabled = true;
            if (statusNode) {
                statusNode.textContent = 'Generando version profesional...';
                statusNode.className = 'social-ai-status social-ai-status--loading';
            }

            try {
                const response = await fetch(button.dataset.generateUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    },
                    body: JSON.stringify({
                        title: titleNode?.value || '',
                        content: contentNode?.value || '',
                        ai_prompt: promptNode?.value || '',
                        platforms: selectedPlatforms,
                    }),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'No fue posible generar la publicacion.');
                }

                if (titleNode && data.title) {
                    titleNode.value = data.title;
                }

                if (contentNode && data.content) {
                    contentNode.value = data.content;
                }

                if (notesNode && data.notes) {
                    notesNode.value = data.notes;
                }

                if (statusNode) {
                    statusNode.textContent = 'La publicacion fue generada y cargada en el formulario.';
                    statusNode.className = 'social-ai-status social-ai-status--success';
                }
            } catch (error) {
                if (statusNode) {
                    statusNode.textContent = error.message || 'Ocurrio un error al generar la publicacion.';
                    statusNode.className = 'social-ai-status social-ai-status--error';
                }
            } finally {
                button.disabled = false;
            }
        });
    });
</script>
