@extends('layouts.app')

@section('content')

@php
    $privacySections = [
        ['id' => 'privacidad-1', 'icon' => 'bi bi-person-vcard', 'title' => '1. Informacion que recopilamos', 'text' => $siteSettings->privacy_section_1],
        ['id' => 'privacidad-2', 'icon' => 'bi bi-gear-wide-connected', 'title' => '2. Uso de la informacion', 'text' => $siteSettings->privacy_section_2],
        ['id' => 'privacidad-3', 'icon' => 'bi bi-shield-lock', 'title' => '3. Proteccion de datos', 'text' => $siteSettings->privacy_section_3],
        ['id' => 'privacidad-4', 'icon' => 'bi bi-diagram-3', 'title' => '4. Compartir informacion con terceros', 'text' => $siteSettings->privacy_section_4],
        ['id' => 'privacidad-5', 'icon' => 'bi bi-person-lines-fill', 'title' => '5. Derechos del titular', 'text' => $siteSettings->privacy_section_5],
        ['id' => 'privacidad-6', 'icon' => 'bi bi-arrow-repeat', 'title' => '6. Cambios a esta politica', 'text' => $siteSettings->privacy_section_6],
        ['id' => 'privacidad-7', 'icon' => 'bi bi-envelope-open', 'title' => '7. Contacto', 'text' => $siteSettings->privacy_section_7],
    ];
@endphp

@include('partials.page-hero', [
    'class' => 'page-hero--privacy',
    'image' => $siteSettings->privacy_hero_image_path,
    'badge' => [
        'icon' => 'bi bi-shield-lock',
        'text' => 'Privacidad y proteccion de datos',
    ],
    'title' => e($siteSettings->privacy_hero_title),
    'description' => $siteSettings->privacy_hero_description,
    'actions' => [
        [
            'href' => '#resumen-privacidad',
            'label' => 'Ver resumen',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => route('contacto'),
            'label' => 'Hablar con nosotros',
            'icon' => 'bi bi-chat-dots',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => count($privacySections), 'label' => 'Puntos clave'],
        ['value' => '100%', 'label' => 'Compromiso con la confidencialidad'],
        ['value' => date('Y'), 'label' => 'Actualizacion vigente'],
    ],
])

<section id="resumen-privacidad" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Resumen claro</span>
            <h2 class="section-heading__title">Tu informacion se trata con un criterio serio y profesional</h2>
            <p class="section-heading__text">
                {{ $siteSettings->privacy_summary_description }}
            </p>
        </div>

        <div class="row g-4">
            @foreach([
                ['icon' => 'bi bi-database-check', 'title' => 'Recopilacion responsable', 'text' => 'Solo pedimos la informacion necesaria para responder consultas, evaluar proyectos y prestar nuestros servicios.', 'accent' => 'brand'],
                ['icon' => 'bi bi-shield-check', 'title' => 'Proteccion de datos', 'text' => 'Aplicamos medidas tecnicas y organizativas razonables para resguardar la informacion personal que recibimos.', 'accent' => 'sunset'],
                ['icon' => 'bi bi-person-check', 'title' => 'Control del titular', 'text' => 'Puedes solicitar acceso, actualizacion o eliminacion de tus datos por medio de nuestros canales oficiales.', 'accent' => 'aqua'],
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
                    <span class="section-heading__eyebrow">Compromiso</span>
                    <h2 class="section-heading__title text-start mb-3">Privacidad explicada sin rodeos</h2>
                    <p class="section-heading__text text-start mb-4">
                        {{ $siteSettings->privacy_side_description }}
                    </p>

                    <ul class="premium-list">
                        <li><i class="bi bi-check-circle-fill"></i><span>Recopilamos solo lo necesario para atender tu solicitud.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Protegemos la informacion con medidas razonables y acceso controlado.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Respetamos el derecho del titular sobre sus datos.</span></li>
                    </ul>

                    <div class="info-banner mt-4">
                        <h3>Ultima actualizacion</h3>
                        <p>{{ $siteSettings->privacy_updated_label }}. Si esta politica cambia, la nueva version se publicara en esta misma vista.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="content-panel legal-shell">
                    <div class="legal-shell__header">
                        <span class="section-heading__eyebrow">Politica completa</span>
                        <h2 class="section-heading__title text-start mb-3">Como cuidamos la informacion que compartes con {{ $siteSettings->site_name }}</h2>
                        <p class="section-heading__text text-start mb-0">
                            El siguiente contenido presenta nuestra politica de privacidad en un formato claro para consulta rapida.
                        </p>
                    </div>

                    <div class="accordion legal-accordion" id="acordeonPrivacidad">
                        @foreach($privacySections as $index => $section)
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
                                    data-bs-parent="#acordeonPrivacidad"
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
            <span class="section-heading__eyebrow">Atencion directa</span>
            <h2 class="section-heading__title mb-3">{{ $siteSettings->privacy_cta_title }}</h2>
            <p class="section-heading__text mb-4">
                {{ $siteSettings->privacy_cta_description }}
            </p>
            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold">
                <i class="bi bi-envelope-paper me-2"></i>Ir a contacto
            </a>
        </div>
    </div>
</section>

@endsection
