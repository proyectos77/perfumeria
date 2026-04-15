@extends('layouts.app')

@section('content')
@php
    $defaultPlatforms = old('platforms', ['facebook', 'instagram', 'linkedin']);
@endphp

<section class="template-editor-page py-5">
    <div class="container-fluid template-editor-shell px-3 px-lg-4 px-xxl-5">
        <div class="template-editor-header mb-4">
            <div>
                <a href="{{ route('admin.social-templates.index') }}" class="template-editor-back">
                    <i class="bi bi-arrow-left-short me-1"></i>Volver a disenos
                </a>
                <span class="template-editor-header__eyebrow">{{ $template['format'] }}</span>
                <h1 class="template-editor-header__title">{{ $template['name'] }}</h1>
                <p class="template-editor-header__text">
                    Cambia los textos, revisa la previsualizacion y crea un borrador en Publicaciones para terminar la programacion o salida.
                </p>
            </div>

            <a href="{{ asset($template['preview']) }}" target="_blank" class="btn btn-outline-light rounded-pill px-4 fw-semibold">
                <i class="bi bi-box-arrow-up-right me-2"></i>Abrir base original
            </a>
        </div>

        @include('admin.partials.navigation')

        @if ($errors->any())
            <div class="alert template-editor-alert mb-4">
                Revisa los campos marcados para poder crear el borrador desde esta plantilla.
            </div>
        @endif

        <form action="{{ route('admin.social-templates.store-draft', $template['slug']) }}" method="POST" class="template-editor-grid">
            @csrf

            <div class="template-editor-panel">
                <div class="template-editor-block">
                    <label for="internal_title" class="form-label fw-semibold">Titulo interno del borrador</label>
                    <input
                        type="text"
                        id="internal_title"
                        name="internal_title"
                        value="{{ old('internal_title', $template['name'] . ' - ' . now()->format('d-m-Y H:i')) }}"
                        class="form-control template-control @error('internal_title') is-invalid @enderror"
                        maxlength="160"
                        required
                    >
                    @error('internal_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="template-editor-block">
                    <label class="form-label fw-semibold d-block">Redes objetivo</label>
                    <div class="template-platform-grid">
                        @foreach($platformOptions as $platformKey => $platformLabel)
                            <label class="template-platform-option">
                                <input
                                    type="checkbox"
                                    name="platforms[]"
                                    value="{{ $platformKey }}"
                                    {{ in_array($platformKey, $defaultPlatforms, true) ? 'checked' : '' }}
                                >
                                <span>{{ $platformLabel }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('platforms')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror
                </div>

                @foreach($template['fields'] as $field)
                    <div class="template-editor-block">
                        <label for="{{ $field['key'] }}" class="form-label fw-semibold">{{ $field['label'] }}</label>
                        @if(($field['type'] ?? 'text') === 'textarea')
                            <textarea
                                id="{{ $field['key'] }}"
                                name="{{ $field['key'] }}"
                                rows="{{ $field['rows'] ?? 3 }}"
                                class="form-control template-control @error($field['key']) is-invalid @enderror"
                                maxlength="{{ $field['max'] ?? 280 }}"
                                data-preview-input="{{ $field['key'] }}"
                                required
                            >{{ old($field['key'], $field['default']) }}</textarea>
                        @else
                            <input
                                type="text"
                                id="{{ $field['key'] }}"
                                name="{{ $field['key'] }}"
                                value="{{ old($field['key'], $field['default']) }}"
                                class="form-control template-control @error($field['key']) is-invalid @enderror"
                                maxlength="{{ $field['max'] ?? 280 }}"
                                data-preview-input="{{ $field['key'] }}"
                                required
                            >
                        @endif
                        @error($field['key'])
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <div class="d-flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
                        <i class="bi bi-send-check me-2"></i>Crear borrador en Publicaciones
                    </button>
                    <a href="{{ route('admin.social-posts.index') }}" class="btn btn-outline-light rounded-pill px-4 fw-semibold">
                        <i class="bi bi-share me-2"></i>Ir a Publicaciones
                    </a>
                </div>
            </div>

            <div class="template-preview-panel">
                <div class="template-preview-panel__intro">
                    <span class="template-preview-chip">Vista previa editable</span>
                    <h2>Asi se veria la pieza</h2>
                    <p>La vista es una simulacion rapida para validar el mensaje antes de llevarlo al modulo de publicaciones.</p>
                </div>

                @if($template['slug'] === 'senales-web')
                    <div class="template-preview template-preview--feed">
                        <div class="template-preview__badge" data-preview="badge">{{ old('badge', $template['fields'][0]['default']) }}</div>
                        <h3 class="template-preview__headline" data-preview="headline">{{ old('headline', $template['fields'][1]['default']) }}</h3>
                        <p class="template-preview__intro" data-preview="intro">{{ old('intro', $template['fields'][2]['default']) }}</p>

                        <div class="template-preview__list">
                            <div class="template-preview__item">
                                <span>01</span>
                                <p data-preview="point_one">{{ old('point_one', $template['fields'][3]['default']) }}</p>
                            </div>
                            <div class="template-preview__item">
                                <span>02</span>
                                <p data-preview="point_two">{{ old('point_two', $template['fields'][4]['default']) }}</p>
                            </div>
                            <div class="template-preview__item">
                                <span>03</span>
                                <p data-preview="point_three">{{ old('point_three', $template['fields'][5]['default']) }}</p>
                            </div>
                        </div>

                        <div class="template-preview__cta" data-preview="cta">{{ old('cta', $template['fields'][6]['default']) }}</div>
                    </div>
                @elseif($template['slug'] === 'auditoria-gratis')
                    <div class="template-preview template-preview--square">
                        <div class="template-preview__square-copy">
                            <div class="template-preview__badge" data-preview="badge">{{ old('badge', $template['fields'][0]['default']) }}</div>
                            <h3 class="template-preview__headline" data-preview="headline">{{ old('headline', $template['fields'][1]['default']) }}</h3>
                            <p class="template-preview__intro" data-preview="intro">{{ old('intro', $template['fields'][2]['default']) }}</p>

                            <ul class="template-preview__bullets">
                                <li data-preview="point_one">{{ old('point_one', $template['fields'][3]['default']) }}</li>
                                <li data-preview="point_two">{{ old('point_two', $template['fields'][4]['default']) }}</li>
                                <li data-preview="point_three">{{ old('point_three', $template['fields'][5]['default']) }}</li>
                            </ul>

                            <div class="template-preview__cta template-preview__cta--dark" data-preview="cta">{{ old('cta', $template['fields'][6]['default']) }}</div>
                        </div>

                        <div class="template-preview__square-side">
                            <div class="template-preview__mockup-card">
                                <div class="template-preview__mockup-top"></div>
                                <div class="template-preview__mockup-hero">Tu pagina puede verse clara y profesional</div>
                                <div class="template-preview__mockup-line"></div>
                                <div class="template-preview__mockup-line short"></div>
                                <div class="template-preview__mockup-button">Solicitar propuesta</div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="template-preview template-preview--story">
                        <div class="template-preview__badge" data-preview="badge">{{ old('badge', $template['fields'][0]['default']) }}</div>
                        <h3 class="template-preview__headline" data-preview="headline">{{ old('headline', $template['fields'][1]['default']) }}</h3>
                        <p class="template-preview__intro" data-preview="intro">{{ old('intro', $template['fields'][2]['default']) }}</p>

                        <div class="template-preview__chat">
                            <div class="template-preview__chat-bubble">
                                <strong>Cliente</strong>
                                <span data-preview="point_one">{{ old('point_one', $template['fields'][3]['default']) }}</span>
                            </div>
                            <div class="template-preview__chat-bubble template-preview__chat-bubble--reply">
                                <strong>Negocio</strong>
                                <span data-preview="point_two">{{ old('point_two', $template['fields'][4]['default']) }}</span>
                            </div>
                        </div>

                        <div class="template-preview__cta" data-preview="cta">{{ old('cta', $template['fields'][5]['default']) }}</div>
                    </div>
                @endif
            </div>
        </form>
    </div>
</section>

<style>
    .template-editor-page {
        background:
            radial-gradient(circle at top left, rgba(245, 124, 0, 0.16), transparent 24%),
            radial-gradient(circle at right top, rgba(38, 198, 218, 0.14), transparent 22%),
            linear-gradient(180deg, #06101d 0%, #0a172b 48%, #0d1b31 100%);
        min-height: calc(100vh - 120px);
    }

    .template-editor-shell {
        max-width: 1820px;
    }

    .template-editor-header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1rem;
        align-items: flex-start;
    }

    .template-editor-back {
        display: inline-flex;
        align-items: center;
        color: #93c5fd;
        text-decoration: none;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .template-editor-header__eyebrow,
    .template-preview-chip {
        display: inline-flex;
        padding: 0.42rem 0.9rem;
        border-radius: 999px;
        background: rgba(245, 124, 0, 0.14);
        border: 1px solid rgba(245, 124, 0, 0.18);
        color: #ffd2a3;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .template-editor-header__title {
        margin: 0.85rem 0 0.75rem;
        color: #f8fafc;
        font-size: clamp(2rem, 2.8vw, 3rem);
        font-weight: 900;
        letter-spacing: -0.05em;
    }

    .template-editor-header__text,
    .template-preview-panel__intro p {
        max-width: 760px;
        margin: 0;
        color: #8ea3bd;
        line-height: 1.8;
    }

    .template-editor-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(360px, 0.92fr);
        gap: 1.5rem;
        align-items: start;
    }

    .template-editor-panel,
    .template-preview-panel {
        border-radius: 30px;
        border: 1px solid rgba(148, 163, 184, 0.14);
        background: rgba(6, 15, 28, 0.88);
        box-shadow: 0 22px 50px rgba(0, 0, 0, 0.24);
    }

    .template-editor-panel {
        padding: 1.5rem;
    }

    .template-preview-panel {
        padding: 1.5rem;
        position: sticky;
        top: 1.5rem;
    }

    .template-preview-panel__intro h2 {
        margin: 0.85rem 0 0.65rem;
        color: #f8fafc;
        font-size: 1.6rem;
        font-weight: 800;
    }

    .template-editor-block + .template-editor-block {
        margin-top: 1rem;
    }

    .template-control {
        border-radius: 18px;
        border: 1px solid rgba(148, 163, 184, 0.16);
        background: rgba(12, 26, 46, 0.92);
        color: #f8fafc;
        padding: 0.95rem 1rem;
        box-shadow: none;
    }

    .template-control:focus {
        background: rgba(12, 26, 46, 0.98);
        color: #fff;
        border-color: rgba(96, 165, 250, 0.34);
        box-shadow: 0 0 0 0.18rem rgba(59, 130, 246, 0.12);
    }

    .template-platform-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 0.8rem;
    }

    .template-platform-option {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.85rem 1rem;
        border-radius: 18px;
        border: 1px solid rgba(148, 163, 184, 0.16);
        background: rgba(12, 26, 46, 0.92);
        color: #dbeafe;
        font-weight: 600;
    }

    .template-editor-alert {
        border: 1px solid rgba(248, 113, 113, 0.22);
        border-radius: 20px;
        background: rgba(127, 29, 29, 0.22);
        color: #fee2e2;
    }

    .template-preview {
        margin-top: 1.4rem;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 26px 60px rgba(0, 0, 0, 0.35);
    }

    .template-preview--feed {
        padding: 1.6rem;
        background:
            radial-gradient(circle at top right, rgba(245, 124, 0, 0.16), transparent 25%),
            radial-gradient(circle at bottom left, rgba(38, 198, 218, 0.18), transparent 30%),
            linear-gradient(180deg, #031b4e 0%, #08306f 100%);
        color: #fff;
    }

    .template-preview--square {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(220px, 0.8fr);
        background: linear-gradient(135deg, #fff7ed 0%, #f4faff 100%);
        color: #06214d;
    }

    .template-preview--story {
        min-height: 780px;
        padding: 1.6rem;
        background:
            radial-gradient(circle at top right, rgba(245, 124, 0, 0.16), transparent 23%),
            radial-gradient(circle at bottom left, rgba(38, 198, 218, 0.14), transparent 26%),
            linear-gradient(180deg, #041d53 0%, #082b72 56%, #041434 100%);
        color: #fff;
    }

    .template-preview__square-copy,
    .template-preview__square-side {
        padding: 1.5rem;
    }

    .template-preview__square-side {
        background: linear-gradient(180deg, #032152 0%, #001233 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .template-preview__badge {
        display: inline-flex;
        align-items: center;
        padding: 0.45rem 0.9rem;
        border-radius: 999px;
        background: rgba(247, 166, 58, 0.96);
        color: #08214d;
        font-size: 0.78rem;
        font-weight: 900;
        letter-spacing: 0.08em;
    }

    .template-preview__headline {
        margin: 1rem 0 0.9rem;
        font-size: clamp(2rem, 3vw, 3.2rem);
        line-height: 1.05;
        font-weight: 900;
        white-space: pre-line;
    }

    .template-preview__intro {
        margin: 0;
        color: inherit;
        opacity: 0.88;
        line-height: 1.75;
        white-space: pre-line;
    }

    .template-preview__list {
        display: grid;
        gap: 0.9rem;
        margin-top: 1.5rem;
    }

    .template-preview__item {
        display: grid;
        grid-template-columns: 56px minmax(0, 1fr);
        gap: 0.9rem;
        align-items: start;
        padding: 1rem;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.09);
    }

    .template-preview__item span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        border-radius: 18px;
        background: linear-gradient(135deg, #f57c00, #26c6da);
        font-weight: 900;
    }

    .template-preview__item p,
    .template-preview__bullets li,
    .template-preview__chat-bubble span {
        margin: 0;
        white-space: pre-line;
        line-height: 1.55;
    }

    .template-preview__cta {
        margin-top: 1.5rem;
        padding: 1rem 1.2rem;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.96);
        color: #08214d;
        font-weight: 800;
    }

    .template-preview__cta--dark {
        background: #001f4d;
        color: #fff;
    }

    .template-preview__bullets {
        display: grid;
        gap: 0.7rem;
        margin: 1.4rem 0 0;
        padding: 0;
        list-style: none;
    }

    .template-preview__bullets li {
        padding: 0.95rem 1rem;
        border-radius: 18px;
        background: rgba(0, 31, 77, 0.08);
        font-weight: 700;
    }

    .template-preview__mockup-card {
        width: 100%;
        max-width: 250px;
        border-radius: 26px;
        background: #f5f8ff;
        padding: 1rem;
        color: #08214d;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.25);
    }

    .template-preview__mockup-top,
    .template-preview__mockup-line {
        height: 12px;
        border-radius: 999px;
        background: #d1def4;
    }

    .template-preview__mockup-hero {
        margin: 1rem 0;
        padding: 1rem;
        border-radius: 20px;
        background: linear-gradient(135deg, #f57c00, #26c6da);
        color: #fff;
        font-weight: 800;
        line-height: 1.4;
    }

    .template-preview__mockup-line.short {
        width: 75%;
        margin-top: 0.6rem;
    }

    .template-preview__mockup-button {
        margin-top: 1rem;
        padding: 0.85rem 1rem;
        border-radius: 999px;
        background: #001f4d;
        color: #fff;
        text-align: center;
        font-weight: 700;
    }

    .template-preview__chat {
        display: grid;
        gap: 1rem;
        margin-top: 1.8rem;
    }

    .template-preview__chat-bubble {
        padding: 1rem 1.1rem;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.12);
    }

    .template-preview__chat-bubble strong {
        display: block;
        margin-bottom: 0.35rem;
    }

    .template-preview__chat-bubble--reply {
        background: rgba(216, 246, 242, 0.96);
        color: #08214d;
        margin-left: 2.5rem;
    }

    @media (max-width: 1199.98px) {
        .template-editor-grid {
            grid-template-columns: 1fr;
        }

        .template-preview-panel {
            position: static;
        }
    }

    @media (max-width: 767.98px) {
        .template-preview--square {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('[data-preview-input]');

        inputs.forEach(function (input) {
            input.addEventListener('input', function () {
                const target = document.querySelector('[data-preview="' + input.dataset.previewInput + '"]');

                if (!target) {
                    return;
                }

                target.textContent = input.value;
            });
        });
    });
</script>
@endsection
