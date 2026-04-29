@extends('layouts.app')

@section('content')

@php
    $heroSlides = $siteSettings->homeSlides();
    $heroMedia = $heroSlides[0]['image'] ?? 'images/home/imagen-home1.png';

    $problemCards = [
        [
            'icon' => 'bi bi-diagram-3',
            'title' => 'Procesos dispersos',
            'text' => 'La información termina repartida entre correos, carpetas, mensajes y archivos sueltos. Eso ralentiza la operación y dificulta el control.',
        ],
        [
            'icon' => 'bi bi-file-earmark-lock',
            'title' => 'Documentos sin trazabilidad',
            'text' => 'Cuando no existe una estructura clara para consultar, versionar y dar seguimiento, aumentan los reprocesos y la dependencia de personas clave.',
        ],
        [
            'icon' => 'bi bi-window-stack',
            'title' => 'Presencia digital que no transmite confianza',
            'text' => 'Un sitio confuso o una solución mal presentada puede afectar la percepción de la empresa y frenar conversaciones comerciales importantes.',
        ],
        [
            'icon' => 'bi bi-signpost-split',
            'title' => 'Decisiones tecnológicas sin suficiente estructura',
            'text' => 'No siempre hace falta más tecnología. Muchas veces hace falta más criterio para definir prioridades, alcance y una ruta realista.',
        ],
    ];

    $serviceBlocks = [
        [
            'icon' => 'bi bi-building-check',
            'title' => 'Presencia digital profesional',
            'text' => 'Diseñamos y desarrollamos sitios web corporativos que ayudan a comunicar con claridad, ordenar el mensaje comercial y proyectar una imagen más sólida.',
            'items' => [
                'Arquitectura de contenido clara',
                'Experiencia enfocada en confianza y comprensión',
                'Sitios alineados con la realidad del negocio',
            ],
            'accent' => 'brand',
        ],
        [
            'icon' => 'bi bi-cpu',
            'title' => 'Soluciones internas y automatización',
            'text' => 'Desarrollamos herramientas a medida e integraciones que ayudan a reducir trabajo manual, mejorar continuidad operativa y ordenar procesos clave.',
            'items' => [
                'Sistemas ajustados a la operación real',
                'Integraciones y flujos de trabajo',
                'Automatización de tareas repetitivas',
            ],
            'accent' => 'sunset',
        ],
        [
            'icon' => 'bi bi-folder2-open',
            'title' => 'Gestión documental con experiencia real',
            'text' => 'Trabajamos soluciones orientadas a la trazabilidad y gestión de información. Además, contamos con un SGDEA propio que usamos como caso real de aplicación.',
            'items' => [
                'Criterio práctico sobre estructura documental',
                'Enfoque en control, consulta y seguimiento',
                'Producto propio validado desde la operación',
            ],
            'accent' => 'aqua',
        ],
    ];

    $differentiators = [
        [
            'icon' => 'bi bi-person-workspace',
            'title' => 'Liderazgo directo',
            'text' => 'Tu proyecto no pasa por capas innecesarias. La definición, el seguimiento y las decisiones clave se trabajan con visión técnica y criterio de negocio.',
        ],
        [
            'icon' => 'bi bi-kanban',
            'title' => 'Método y acompañamiento',
            'text' => 'No trabajamos desde la improvisación. Buscamos entender el contexto, ordenar prioridades y ejecutar con una ruta clara de principio a fin.',
        ],
        [
            'icon' => 'bi bi-check2-square',
            'title' => 'Soluciones aterrizadas a la realidad',
            'text' => 'Nos importa que la solución funcione en la práctica, se pueda sostener y responda a necesidades reales, no a discursos vacíos.',
        ],
        [
            'icon' => 'bi bi-shield-check',
            'title' => 'SGDEA como producto real',
            'text' => 'Nuestro sistema de gestión documental no es una promesa comercial. Es una base real de trabajo que fortalece el criterio con el que acompañamos este tipo de proyectos.',
        ],
    ];
@endphp

<header class="hero-section position-relative overflow-hidden">
    <div class="hero-section__media" aria-hidden="true" style="background-image: url('{{ $siteSettings->assetUrl($heroMedia) }}');"></div>
    <div class="hero-section__overlay" aria-hidden="true"></div>
    <div class="hero-section__halo hero-section__halo--top" aria-hidden="true"></div>
    <div class="hero-section__halo hero-section__halo--bottom" aria-hidden="true"></div>
    <div class="hero-section__grid" aria-hidden="true"></div>

    <div class="container hero-section__content position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 text-center">
                <div class="badge bg-warning text-dark px-4 py-2 mb-4 fw-semibold">
                    <i class="bi bi-stars me-2"></i>Firma tecnológica para soluciones digitales y gestión documental
                </div>

                <h1 class="display-2 fw-bold text-white mb-4 hero-section__title">
                    Tecnología para empresas que necesitan más orden, más claridad y mejor control.
                </h1>

                <p class="lead fs-4 text-white-50 mb-5 hero-section__text">
                    En Crear System diseñamos e implementamos soluciones digitales y documentales para organizaciones que quieren operar con mayor estructura, comunicar mejor su valor y avanzar con respaldo técnico real. Trabajamos con método, acompañamiento cercano y enfoque práctico.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                        <i class="bi bi-chat-dots me-2"></i>Agendar una conversación estratégica
                    </a>
                    <a href="#que-hacemos" class="btn btn-outline-light btn-lg px-5 fw-semibold">
                        <i class="bi bi-arrow-down-circle me-2"></i>Conocer qué hacemos
                    </a>
                </div>

                <p class="hero-section__microcopy text-white-50 mt-4 mb-0">
                    Conversemos sobre tu proceso actual, tus prioridades y el tipo de solución que realmente necesitas.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-4 gap-lg-5 mt-5 hero-stats">
                    <div class="stat-item">
                        <span class="display-6 fw-bold text-warning">Soluciones</span>
                        <p class="text-white-50 mb-0 small">digitales y documentales con enfoque de negocio</p>
                    </div>
                    <div class="stat-item">
                        <span class="display-6 fw-bold text-warning">Método</span>
                        <p class="text-white-50 mb-0 small">para diagnosticar, ordenar y ejecutar</p>
                    </div>
                    <div class="stat-item">
                        <span class="display-6 fw-bold text-warning">SGDEA</span>
                        <p class="text-white-50 mb-0 small">como producto propio y caso real de aplicación</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0 w-100" style="z-index: 3;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" style="width: 100%; height: 100px;">
            <path fill="#ffffff" d="M0,64 C288,120 576,0 864,64 C1152,128 1440,32 1440,32 L1440,120 L0,120 Z"></path>
        </svg>
    </div>
</header>

<section class="py-5 bg-white" id="problemas">
    <div class="container py-lg-4">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-light text-primary px-3 py-2 mb-3 section-badge">
                    <i class="bi bi-exclamation-diamond me-1"></i>Qué problema resolvemos
                </span>
                <h2 class="display-5 fw-bold text-dark mb-3">
                    Problemas reales que frenan la operación y la confianza.
                </h2>
                <p class="lead text-muted mb-0">
                    Muchas empresas no necesitan más herramientas por sí solas. Necesitan más orden, mejor estructura y una solución que conecte tecnología, procesos e información.
                </p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($problemCards as $card)
                <div class="col-md-6">
                    <article class="problem-card h-100">
                        <div class="problem-card__icon">
                            <i class="{{ $card['icon'] }}"></i>
                        </div>
                        <h3 class="problem-card__title">{{ $card['title'] }}</h3>
                        <p class="problem-card__text mb-0">{{ $card['text'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 home-services" id="que-hacemos">
    <div class="container py-lg-4">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3 section-badge">
                    <i class="bi bi-grid me-1"></i>Qué hacemos
                </span>
                <h2 class="display-5 fw-bold text-white mb-3">
                    Tecnología aplicada a necesidades reales de negocio.
                </h2>
                <p class="lead text-white-50 mb-0">
                    Acompañamos proyectos donde la tecnología debe aportar orden, claridad y utilidad real para la operación.
                </p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($serviceBlocks as $block)
                <div class="col-lg-4">
                    <article class="service-pill h-100">
                        <div class="service-pill__icon service-pill__icon--{{ $block['accent'] }}">
                            <i class="{{ $block['icon'] }}"></i>
                        </div>
                        <h3 class="service-pill__title">{{ $block['title'] }}</h3>
                        <p class="service-pill__text">{{ $block['text'] }}</p>

                        <ul class="service-pill__list">
                            @foreach($block['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 bg-light" id="diferencial">
    <div class="container py-lg-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <span class="badge bg-primary px-3 py-2 mb-3 section-badge">
                    <i class="bi bi-shield-check me-1"></i>Por qué Crear System es diferente
                </span>
                <h2 class="display-5 fw-bold text-dark mb-4">
                    Una forma de trabajar más directa, más clara y más responsable.
                </h2>
                <p class="lead text-muted mb-4">
                    Crear System no se presenta como una gran agencia ni como una promesa inflada. Somos una firma tecnológica en crecimiento, con enfoque serio, liderazgo directo y compromiso real con cada proyecto.
                </p>

                <div class="difference-panel">
                    <span class="difference-panel__eyebrow">Producto real</span>
                    <h3>SGDEA con aplicación práctica</h3>
                    <p class="mb-0">
                        Nuestro Sistema de Gestión Documental Electrónica nos permite trabajar desde la experiencia directa, validar decisiones y acompañar este tipo de proyectos con mayor criterio.
                    </p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row g-4">
                    @foreach($differentiators as $item)
                        <div class="col-md-6">
                            <article class="difference-card h-100">
                                <div class="difference-card__icon">
                                    <i class="{{ $item['icon'] }}"></i>
                                </div>
                                <h3 class="difference-card__title">{{ $item['title'] }}</h3>
                                <p class="difference-card__text mb-0">{{ $item['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 position-relative overflow-hidden home-cta" id="diagnostico">
    <div class="position-absolute w-100 h-100 overflow-hidden">
        <div class="position-absolute rounded-circle home-cta__bubble home-cta__bubble--one"></div>
        <div class="position-absolute rounded-circle home-cta__bubble home-cta__bubble--two"></div>
    </div>

    <div class="container position-relative text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <span class="badge bg-warning text-dark px-4 py-2 mb-4">
                    <i class="bi bi-send me-1"></i>Diagnóstico o conversación estratégica
                </span>
                <h2 class="display-4 fw-bold text-white mb-4">
                    Si tu empresa necesita más orden, claridad y respaldo técnico, podemos ayudarte a definir el siguiente paso.
                </h2>
                <p class="lead text-white-50 mb-5 home-cta__text">
                    Podemos revisar tu situación actual, identificar puntos críticos y conversar sobre una solución viable para tu operación, tu información y tu presencia digital.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                        <i class="bi bi-chat-dots me-2"></i>Solicitar diagnóstico inicial
                    </a>
                    <a href="{{ $siteSettings->whatsappUrl() }}" target="_blank" class="btn btn-outline-light btn-lg px-5 fw-semibold">
                        <i class="bi bi-whatsapp me-2"></i>Hablar por WhatsApp
                    </a>
                </div>

                <p class="hero-section__microcopy text-white-50 mt-4 mb-0">
                    Una conversación clara, sin presión comercial y enfocada en lo que tu empresa realmente necesita.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
