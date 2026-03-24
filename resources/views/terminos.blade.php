@extends('layouts.app')

@section('content')

@include('partials.page-hero', [
    'class' => 'page-hero--terms',
    'image' => 'images/quienes-somos/quienes-somos1.png',
    'badge' => [
        'icon' => 'bi bi-file-earmark-text',
        'text' => 'Terminos y condiciones',
    ],
    'title' => 'Uso del sitio con <span class="text-warning">reglas claras, serias y transparentes</span>',
    'description' => 'Estos terminos explican las condiciones generales de uso del sitio web de Crear System y el alcance informativo de nuestros contenidos y servicios.',
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
        ['value' => '6', 'label' => 'Condiciones principales'],
        ['value' => 'Legal', 'label' => 'Marco informativo'],
        ['value' => '2026', 'label' => 'Version vigente'],
    ],
])

@php
    $termsFeatures = [
        [
            'icon' => 'bi bi-globe2',
            'title' => 'Uso adecuado del sitio',
            'text' => 'Este espacio debe utilizarse de forma licita, respetuosa y coherente con el proposito informativo y comercial del proyecto.',
            'accent' => 'brand',
        ],
        [
            'icon' => 'bi bi-award',
            'title' => 'Propiedad intelectual',
            'text' => 'Los contenidos, recursos visuales y textos del sitio estan protegidos y no deben reproducirse sin autorizacion.',
            'accent' => 'sunset',
        ],
        [
            'icon' => 'bi bi-clipboard-check',
            'title' => 'Condiciones transparentes',
            'text' => 'Explicamos el alcance general del sitio para que el visitante tenga una referencia clara antes de contactarnos.',
            'accent' => 'aqua',
        ],
    ];

    $termSections = [
        [
            'id' => 'terminos-1',
            'icon' => 'bi bi-globe',
            'title' => '1. Uso del sitio web',
            'text' => 'Al acceder a este sitio aceptas hacer un uso adecuado de sus contenidos, servicios y formularios. El usuario se compromete a no emplear este espacio con fines ilicitos, fraudulentos o que afecten la operacion, seguridad o reputacion de Crear System o de terceros.',
        ],
        [
            'id' => 'terminos-2',
            'icon' => 'bi bi-patch-check',
            'title' => '2. Propiedad intelectual',
            'text' => 'Los textos, imagenes, logotipos, disenos y demas recursos publicados en este sitio son propiedad de Crear System o cuentan con autorizacion para su uso. Su reproduccion total o parcial sin autorizacion previa no esta permitida.',
        ],
        [
            'id' => 'terminos-3',
            'icon' => 'bi bi-code-square',
            'title' => '3. Servicios ofrecidos',
            'text' => 'Crear System ofrece servicios relacionados con desarrollo web, software a medida, automatizacion, mantenimiento y consultoria tecnologica. La informacion publicada en este sitio es de caracter informativo y puede ajustarse segun la evolucion del portafolio o los requerimientos de cada proyecto.',
        ],
        [
            'id' => 'terminos-4',
            'icon' => 'bi bi-shield-exclamation',
            'title' => '4. Limitacion de responsabilidad',
            'text' => 'Aunque procuramos mantener la informacion actualizada y el sitio disponible, Crear System no garantiza la ausencia absoluta de errores, interrupciones o fallas tecnicas. El uso del sitio se realiza bajo la responsabilidad del usuario.',
        ],
        [
            'id' => 'terminos-5',
            'icon' => 'bi bi-arrow-repeat',
            'title' => '5. Actualizacion de los terminos',
            'text' => 'Nos reservamos el derecho de modificar estos terminos cuando resulte necesario. Cualquier actualizacion sera publicada en esta misma pagina y entrara en vigencia desde su fecha de publicacion.',
        ],
        [
            'id' => 'terminos-6',
            'icon' => 'bi bi-envelope-open',
            'title' => '6. Contacto',
            'text' => 'Si tienes preguntas sobre estos terminos o deseas ampliar informacion sobre nuestros servicios, puedes escribirnos desde nuestra pagina de contacto y atenderemos tu solicitud.',
        ],
    ];
@endphp

<section id="resumen-terminos" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Marco general</span>
            <h2 class="section-heading__title">Condiciones pensadas para ofrecer claridad y confianza</h2>
            <p class="section-heading__text">
                Estos terminos resumen las reglas generales de uso del sitio y ayudan a que la relacion informativa con nuestros visitantes tenga una base clara desde el principio.
            </p>
        </div>

        <div class="row g-4">
            @foreach($termsFeatures as $feature)
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
                        Este documento establece el uso general del sitio, el alcance de sus contenidos y la forma en que actualizamos esta informacion cuando es necesario.
                    </p>

                    <ul class="premium-list">
                        <li><i class="bi bi-check-circle-fill"></i><span>Define el uso adecuado del sitio y de sus formularios.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Protege nuestros contenidos, marca y recursos visuales.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Aclara el caracter informativo del portafolio y los servicios.</span></li>
                    </ul>

                    <div class="info-banner mt-4">
                        <h3>Version vigente</h3>
                        <p>23 de marzo de 2026. Si estos terminos cambian, la nueva version se publicara en esta misma vista.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="content-panel legal-shell">
                    <div class="legal-shell__header">
                        <span class="section-heading__eyebrow">Texto completo</span>
                        <h2 class="section-heading__title text-start mb-3">Terminos generales del sitio web de Crear System</h2>
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
            <h2 class="section-heading__title mb-3">Si algo no esta claro, te lo explicamos directamente</h2>
            <p class="section-heading__text mb-4">
                Si necesitas precision sobre el alcance de estos terminos o sobre nuestros servicios, puedes comunicarte con nosotros y recibir una respuesta clara.
            </p>
            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold">
                <i class="bi bi-envelope-paper me-2"></i>Ir a contacto
            </a>
        </div>
    </div>
</section>

@endsection
