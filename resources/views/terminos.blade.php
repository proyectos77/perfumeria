@extends('layouts.app')

@section('content')

@php
    $termSections = [
        ['id' => 'terminos-1', 'icon' => 'bi bi-globe', 'title' => '1. Uso del sitio web', 'text' => $siteSettings->terms_section_1],
        ['id' => 'terminos-2', 'icon' => 'bi bi-patch-check', 'title' => '2. Propiedad intelectual', 'text' => $siteSettings->terms_section_2],
        ['id' => 'terminos-3', 'icon' => 'bi bi-code-square', 'title' => '3. Servicios ofrecidos', 'text' => $siteSettings->terms_section_3],
        ['id' => 'terminos-4', 'icon' => 'bi bi-shield-exclamation', 'title' => '4. Limitacion de responsabilidad', 'text' => $siteSettings->terms_section_4],
        ['id' => 'terminos-5', 'icon' => 'bi bi-arrow-repeat', 'title' => '5. Actualizacion de los terminos', 'text' => $siteSettings->terms_section_5],
        ['id' => 'terminos-6', 'icon' => 'bi bi-envelope-open', 'title' => '6. Contacto', 'text' => $siteSettings->terms_section_6],
    ];
@endphp

@include('partials.page-hero', [
    'class' => 'page-hero--terms',
    'image' => $siteSettings->terms_hero_image_path,
    'badge' => [
        'icon' => 'bi bi-file-earmark-text',
        'text' => 'Terminos y condiciones',
    ],
    'title' => e($siteSettings->terms_hero_title),
    'description' => $siteSettings->terms_hero_description,
    'actions' => [
        [
            'href' => '#resumen-terminos',
            'label' => 'Ver terminos',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => route('contacto'),
            'label' => 'Resolver dudas',
            'icon' => 'bi bi-chat-dots',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => count($termSections), 'label' => 'Condiciones principales'],
        ['value' => 'Legal', 'label' => 'Marco informativo'],
        ['value' => date('Y'), 'label' => 'Version vigente'],
    ],
])

<section id="resumen-terminos" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Marco general</span>
            <h2 class="section-heading__title">Condiciones pensadas para ofrecer claridad y confianza</h2>
            <p class="section-heading__text">
                {{ $siteSettings->terms_summary_description }}
            </p>
        </div>

        <div class="row g-4">
            @foreach([
                ['icon' => 'bi bi-globe2', 'title' => 'Uso adecuado del sitio', 'text' => 'Este espacio debe utilizarse de forma licita, respetuosa y coherente con el proposito informativo y comercial del proyecto.', 'accent' => 'brand'],
                ['icon' => 'bi bi-award', 'title' => 'Propiedad intelectual', 'text' => 'Los contenidos, recursos visuales y textos del sitio estan protegidos y no deben reproducirse sin autorizacion.', 'accent' => 'sunset'],
                ['icon' => 'bi bi-clipboard-check', 'title' => 'Condiciones transparentes', 'text' => 'Explicamos el alcance general del sitio para que el visitante tenga una referencia clara antes de contactarnos.', 'accent' => 'aqua'],
            ] as $feature)
                <div class="col-lg-4">
                    <article class="premium-card h-100">
                        <div class="premium-card__icon premium-card__icon--{{ $feature['accent'] }}">
                            <i class="{{ $feature['icon'] }}"></i>
                        </div>
                        <h3 class="premium-card__title">{{ $feature['title'] }}</h3>
                        <p class="premium-card__text">{{ $feature['text'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-start">
            <div class="col-lg-4">
                <div class="content-panel legal-side-panel">
                    <span class="section-heading__eyebrow">Alcance</span>
                    <h2 class="section-heading__title text-start mb-3">Una referencia legal clara para quien visita el sitio</h2>
                    <p class="section-heading__text text-start mb-4">
                        {{ $siteSettings->terms_side_description }}
                    </p>

                    <ul class="premium-list">
                        <li><i class="bi bi-check-circle-fill"></i><span>Define el uso adecuado del sitio y de sus formularios.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Protege nuestros contenidos, marca y recursos visuales.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Aclara el caracter informativo del portafolio y los servicios.</span></li>
                    </ul>

                    <div class="info-banner mt-4">
                        <h3>Version vigente</h3>
                        <p>{{ $siteSettings->terms_updated_label }}. Si estos terminos cambian, la nueva version se publicara en esta misma vista.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="content-panel legal-shell">
                    <div class="legal-shell__header">
                        <span class="section-heading__eyebrow">Texto completo</span>
                        <h2 class="section-heading__title text-start mb-3">Terminos generales del sitio web de {{ $siteSettings->site_name }}</h2>
                        <p class="section-heading__text text-start mb-0">
                            A continuacion presentamos el contenido legal principal en un formato claro y facil de consultar.
                        </p>
                    </div>

                    <div class="accordion legal-accordion" id="politicaLegalAcordeon">
                        @foreach($termSections as $index => $section)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $section['id'] }}">
                                    <button
                                        class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section['id'] }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="{{ $section['id'] }}"
                                    >
                                        <span class="legal-accordion__icon"><i class="{{ $section['icon'] }}"></i></span>
                                        <span>{{ $section['title'] }}</span>
                                    </button>
                                </h2>
                                <div
                                    id="{{ $section['id'] }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="heading-{{ $section['id'] }}"
                                    data-bs-parent="#politicaLegalAcordeon"
                                >
                                    <div class="accordion-body">
                                        {{ $section['text'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-surface section-surface--brand py-5">
    <div class="container py-lg-4">
        <div class="cta-strip text-center">
            <span class="section-heading__eyebrow">Acompanamiento</span>
            <h2 class="section-heading__title mb-3">{{ $siteSettings->terms_cta_title }}</h2>
            <p class="section-heading__text mb-4">
                {{ $siteSettings->terms_cta_description }}
            </p>
            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold">
                <i class="bi bi-envelope-paper me-2"></i>Ir a contacto
            </a>
        </div>
    </div>
</section>

@endsection
