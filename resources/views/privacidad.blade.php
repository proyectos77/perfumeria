@extends('layouts.app')

@section('content')

@include('partials.page-hero', [
    'class' => 'page-hero--privacy',
    'image' => 'images/home/imagen-home3.png',
    'badge' => [
        'icon' => 'bi bi-shield-lock',
        'text' => 'Privacidad y proteccion de datos',
    ],
    'title' => 'Tratamos tu informacion con <span class="text-warning">claridad, respeto y responsabilidad</span>',
    'description' => 'Esta politica explica que datos recopilamos, para que los usamos y como los protegemos cuando te comunicas con Crear System o solicitas nuestros servicios.',
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
        ['value' => '7', 'label' => 'Puntos clave'],
        ['value' => '100%', 'label' => 'Compromiso con la confidencialidad'],
        ['value' => '2026', 'label' => 'Actualizacion vigente'],
    ],
])

@php
    $privacyFeatures = [
        [
            'icon' => 'bi bi-database-check',
            'title' => 'Recopilacion responsable',
            'text' => 'Solo pedimos la informacion necesaria para responder consultas, evaluar proyectos y prestar nuestros servicios.',
            'accent' => 'brand',
        ],
        [
            'icon' => 'bi bi-shield-check',
            'title' => 'Proteccion de datos',
            'text' => 'Aplicamos medidas tecnicas y organizativas razonables para resguardar la informacion personal que recibimos.',
            'accent' => 'sunset',
        ],
        [
            'icon' => 'bi bi-person-check',
            'title' => 'Control del titular',
            'text' => 'Puedes solicitar acceso, actualizacion o eliminacion de tus datos por medio de nuestros canales oficiales.',
            'accent' => 'aqua',
        ],
    ];

    $privacySections = [
        [
            'id' => 'privacidad-1',
            'icon' => 'bi bi-person-vcard',
            'title' => '1. Informacion que recopilamos',
            'text' => 'Podemos recopilar datos como nombre, correo electronico, numero de contacto y detalles relacionados con tu empresa o proyecto cuando completas formularios, solicitas informacion o te comunicas con nuestro equipo.',
        ],
        [
            'id' => 'privacidad-2',
            'icon' => 'bi bi-gear-wide-connected',
            'title' => '2. Uso de la informacion',
            'text' => 'Usamos la informacion para responder solicitudes, presentar propuestas, prestar servicios, mejorar la experiencia del usuario y mantener comunicaciones relacionadas con nuestros servicios y procesos de atencion.',
        ],
        [
            'id' => 'privacidad-3',
            'icon' => 'bi bi-shield-lock',
            'title' => '3. Proteccion de datos',
            'text' => 'Implementamos medidas razonables para proteger la informacion frente a accesos no autorizados, perdida, alteracion o divulgacion indebida. El acceso se limita a personal autorizado y a terceros necesarios para la prestacion del servicio.',
        ],
        [
            'id' => 'privacidad-4',
            'icon' => 'bi bi-diagram-3',
            'title' => '4. Compartir informacion con terceros',
            'text' => 'No vendemos ni comercializamos informacion personal. Solo podremos compartirla con proveedores o aliados vinculados a la operacion del servicio, bajo compromisos de confidencialidad y cuando exista una necesidad legitima o legal.',
        ],
        [
            'id' => 'privacidad-5',
            'icon' => 'bi bi-person-lines-fill',
            'title' => '5. Derechos del titular',
            'text' => 'Puedes solicitar acceso, rectificacion, actualizacion, supresion o revocatoria de autorizacion conforme a la normativa aplicable. Para ejercer estos derechos, puedes escribirnos por nuestros canales de contacto.',
        ],
        [
            'id' => 'privacidad-6',
            'icon' => 'bi bi-arrow-repeat',
            'title' => '6. Cambios a esta politica',
            'text' => 'Podremos actualizar esta politica cuando sea necesario para reflejar cambios operativos, legales o de servicio. Cualquier ajuste sera publicado en esta misma pagina con su fecha correspondiente.',
        ],
        [
            'id' => 'privacidad-7',
            'icon' => 'bi bi-envelope-open',
            'title' => '7. Contacto',
            'text' => 'Si tienes dudas sobre esta politica o sobre el tratamiento de tus datos personales, puedes escribirnos desde nuestra pagina de contacto y te responderemos a la mayor brevedad posible.',
        ],
    ];
@endphp

<section id="resumen-privacidad" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Resumen claro</span>
            <h2 class="section-heading__title">Tu informacion se trata con un criterio serio y profesional</h2>
            <p class="section-heading__text">
                Queremos que tengas claridad antes de dejarnos tus datos. Por eso explicamos esta politica de forma directa, comprensible y coherente con una relacion basada en confianza.
            </p>
        </div>

        <div class="row g-4">
            @foreach($privacyFeatures as $feature)
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
                        Esta pagina resume como tratamos la informacion que recibimos cuando alguien desea conocernos, solicitar una propuesta o iniciar un proyecto con nosotros.
                    </p>

                    <ul class="premium-list">
                        <li><i class="bi bi-check-circle-fill"></i><span>Recopilamos solo lo necesario para atender tu solicitud.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Protegemos la informacion con medidas razonables y acceso controlado.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Respetamos el derecho del titular sobre sus datos.</span></li>
                    </ul>

                    <div class="info-banner mt-4">
                        <h3>Ultima actualizacion</h3>
                        <p>23 de marzo de 2026. Si esta politica cambia, la nueva version se publicara en esta misma vista.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="content-panel legal-shell">
                    <div class="legal-shell__header">
                        <span class="section-heading__eyebrow">Politica completa</span>
                        <h2 class="section-heading__title text-start mb-3">Como cuidamos la informacion que compartes con Crear System</h2>
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
            <h2 class="section-heading__title mb-3">Si necesitas claridad sobre el uso de tus datos, conversemos</h2>
            <p class="section-heading__text mb-4">
                Si tienes preguntas sobre esta politica o quieres gestionar una solicitud relacionada con tus datos, puedes comunicarte con nosotros por los canales oficiales.
            </p>
            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold">
                <i class="bi bi-envelope-paper me-2"></i>Ir a contacto
            </a>
        </div>
    </div>
</section>

@endsection
