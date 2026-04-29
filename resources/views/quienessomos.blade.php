@extends('layouts.app')

@section('content')

@php
    $definitionPoints = [
        [
            'icon' => 'bi bi-building-gear',
            'title' => 'Firma tecnológica en crecimiento',
            'text' => 'Crear System trabaja con una estructura cercana y especializada, enfocada en resolver necesidades reales sin recurrir a promesas sobredimensionadas.',
        ],
        [
            'icon' => 'bi bi-folder-check',
            'title' => 'Enfoque en soluciones digitales y documentales',
            'text' => 'La firma combina presencia digital, software a medida y gestión documental para apoyar operaciones que necesitan más orden y mejor control.',
        ],
        [
            'icon' => 'bi bi-people',
            'title' => 'Acompañamiento directo',
            'text' => 'Cada proyecto se trabaja con liderazgo cercano, seguimiento claro y decisiones técnicas alineadas con las prioridades del negocio.',
        ],
    ];

    $originPoints = [
        'Crear System nace al identificar una necesidad concreta: muchas empresas requieren apoyo tecnológico serio, pero no siempre encuentran un acompañamiento que combine criterio operativo, ejecución técnica y claridad en la gestión.',
        'Desde ese punto de partida, la firma se consolida como una propuesta orientada a ordenar procesos, estructurar soluciones y construir herramientas útiles para el trabajo diario.',
        'El desarrollo del SGDEA como producto propio refuerza esa visión. No se presenta como una promesa futura, sino como una experiencia real que ayuda a validar decisiones y fortalecer el enfoque documental de la firma.',
    ];

    $leadershipPoints = [
        [
            'icon' => 'bi bi-shield-check',
            'title' => 'Responsabilidad',
            'text' => 'El liderazgo del proyecto mantiene seguimiento real sobre alcance, tiempos, decisiones y calidad de la ejecución.',
        ],
        [
            'icon' => 'bi bi-people',
            'title' => 'Acompañamiento',
            'text' => 'El cliente cuenta con una dirección cercana para resolver dudas, ajustar prioridades y avanzar con una comunicación más clara.',
        ],
        [
            'icon' => 'bi bi-diagram-3',
            'title' => 'Coherencia',
            'text' => 'La misma dirección conecta negocio, gestión y criterio técnico para que la solución mantenga sentido desde la definición hasta la entrega.',
        ],
    ];

    $beliefs = [
        [
            'icon' => 'bi bi-grid-1x2',
            'title' => 'Orden',
            'text' => 'Un proyecto bien llevado necesita estructura, prioridades visibles y procesos que permitan avanzar sin improvisación innecesaria.',
        ],
        [
            'icon' => 'bi bi-diagram-3',
            'title' => 'Método',
            'text' => 'La tecnología aporta más valor cuando existe una forma clara de diagnosticar, decidir, implementar y acompañar cada etapa.',
        ],
        [
            'icon' => 'bi bi-chat-square-text',
            'title' => 'Claridad',
            'text' => 'Creemos en una comunicación directa, comprensible y honesta, tanto para explicar una solución como para gestionar expectativas y alcance.',
        ],
    ];
@endphp

@include('partials.page-hero', [
    'class' => 'page-hero--about',
    'image' => $siteSettings->about_hero_image_path,
    'badge' => [
        'icon' => 'bi bi-buildings',
        'text' => 'Quiénes somos',
    ],
    'title' => 'Una firma tecnológica que trabaja con método, cercanía y criterio técnico.',
    'description' => 'Crear System es una firma tecnológica orientada a soluciones digitales y gestión documental para empresas que necesitan más orden, mejor control de su información y acompañamiento confiable.',
    'actions' => [
        [
            'href' => '#que-es-crear-system',
            'label' => 'Conocer la firma',
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
        ['value' => 'B2B', 'label' => 'Enfoque empresarial'],
        ['value' => 'PM', 'label' => 'Liderazgo de proyectos'],
        ['value' => 'SGDEA', 'label' => 'Producto real y aplicación práctica'],
    ],
])

<section id="que-es-crear-system" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">1. Qué es Crear System</span>
            <h2 class="section-heading__title">Una firma enfocada en resolver necesidades reales con tecnología bien dirigida</h2>
            <p class="section-heading__text">Crear System acompaña a empresas que necesitan estructurar mejor sus soluciones digitales, ordenar información y avanzar con una ejecución más clara y confiable.</p>
        </div>

        <div class="row g-4">
            @foreach($definitionPoints as $point)
                <div class="col-lg-4">
                    <article class="premium-card premium-card--story h-100">
                        <div class="premium-card__icon premium-card__icon--brand">
                            <i class="{{ $point['icon'] }}"></i>
                        </div>
                        <h3 class="premium-card__title">{{ $point['title'] }}</h3>
                        <p class="premium-card__text">{{ $point['text'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" id="como-nace">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="image-panel">
                    <img src="{{ $siteSettings->assetUrl($siteSettings->about_feature_image_path) }}" alt="Contexto de trabajo de {{ $siteSettings->site_name }}" class="img-fluid">
                    <div class="image-panel__badge image-panel__badge--compact">
                        <strong>{{ $siteSettings->site_name }}</strong>
                        <span>Una propuesta creada para trabajar con más estructura, mejor criterio y acompañamiento real.</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="content-panel">
                    <span class="section-heading__eyebrow">2. Cómo nace el proyecto</span>
                    <h2 class="section-heading__title text-start mb-3">El proyecto surge desde una necesidad práctica, no desde un discurso aspiracional</h2>

                    @foreach($originPoints as $paragraph)
                        <p class="section-heading__text text-start mb-3">{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-surface py-5" id="liderazgo">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">3. Dirección del proyecto</span>
            <h2 class="section-heading__title">Un liderazgo directo que aporta seguimiento, criterio y coherencia</h2>
            <p class="section-heading__text">Crear System es liderado por su fundador, quien asume la dirección del proyecto desde tres frentes: visión de negocio, gestión del trabajo y responsabilidad técnica. Para el cliente, eso se traduce en una relación más clara y menos intermediación.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="row g-4">
                    @foreach($leadershipPoints as $point)
                        <div class="col-md-6 {{ $loop->last ? 'col-lg-12' : '' }}">
                            <article class="leadership-card h-100">
                                <div class="leadership-card__icon">
                                    <i class="{{ $point['icon'] }}"></i>
                                </div>
                                <h3 class="leadership-card__title">{{ $point['title'] }}</h3>
                                <p class="leadership-card__text mb-0">{{ $point['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-5">
                <aside class="leadership-panel h-100">
                    <div class="leadership-panel__header">
                        <img src="{{ $siteSettings->assetUrl($siteSettings->about_profile_photo_path) }}" class="leadership-panel__avatar" alt="{{ $siteSettings->about_profile_name }}">
                        <div>
                            <p class="leadership-panel__eyebrow mb-1">Liderazgo</p>
                            <h3 class="mb-1">{{ $siteSettings->about_profile_name }}</h3>
                            <p class="mb-0">Founder, Project Manager &amp; Technical Lead</p>
                        </div>
                    </div>

                    <p class="leadership-panel__text">
                        Geovanni Pérez lidera Crear System con responsabilidad directa sobre la definición, el seguimiento y la coherencia de cada proyecto. Esa integración es una ventaja porque permite acompañar mejor al cliente, sostener decisiones con criterio y evitar desconexión entre lo que se propone y lo que realmente se ejecuta.
                    </p>

                    <ul class="leadership-panel__list">
                        <li>Responsabilidad directa sobre alcance, seguimiento y calidad del proyecto.</li>
                        <li>Acompañamiento cercano durante decisiones, ajustes y puntos críticos.</li>
                        <li>Coherencia entre visión comercial, gestión del trabajo y ejecución técnica.</li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="en-que-creemos">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">4. En qué creemos</span>
            <h2 class="section-heading__title">Orden, método y claridad como base de cada proyecto</h2>
            <p class="section-heading__text">Crear System entiende la tecnología como una herramienta de apoyo para organizar mejor el trabajo, tomar decisiones con más criterio y construir soluciones sostenibles.</p>
        </div>

        <div class="row g-4">
            @foreach($beliefs as $belief)
                <div class="col-lg-4">
                    <article class="belief-card h-100">
                        <div class="belief-card__icon">
                            <i class="{{ $belief['icon'] }}"></i>
                        </div>
                        <h3 class="belief-card__title">{{ $belief['title'] }}</h3>
                        <p class="belief-card__text mb-0">{{ $belief['text'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 position-relative overflow-hidden about-cta">
    <div class="container py-lg-4 text-center position-relative">
        <span class="badge bg-warning text-dark px-4 py-2 mb-4">
            <i class="bi bi-chat-dots me-1"></i>Conversemos
        </span>
        <h2 class="display-5 fw-bold text-white mb-3">Si necesitas un proyecto con liderazgo claro y respaldo técnico, podemos ayudarte.</h2>
        <p class="lead text-white-50 about-cta__text mb-4">Crear System trabaja con empresas que valoran una relación profesional, una ruta de trabajo ordenada y decisiones técnicas bien explicadas.</p>
        <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
            <i class="bi bi-send me-2"></i>Iniciar conversación
        </a>
    </div>
</section>

@endsection
